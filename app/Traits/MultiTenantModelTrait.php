<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait MultiTenantModelTrait
{
    public static function getRoleId() {
        $isSysAdmin = auth()->user()->roles->contains(1);
        $isAdminDPD = auth()->user()->roles->contains(2);
        $isAdminDPC = auth()->user()->roles->contains(3);
        $roleid = 4;
        if($isSysAdmin) {
            $roleid = 1;
        } elseif($isAdminDPD) {
            $roleid = 2;
        } elseif($isAdminDPC) {
            $roleid = 3;
        }
        return $roleid;
    }
	
    public static function bootMultiTenantModelTrait()
    {
		$roleid = MultiTenantModelTrait::getRoleId();
        if (!app()->runningInConsole() && auth()->check()) {
            $isAdmin = $roleid < 4;
            static::creating(function ($model) use ($isAdmin) {
                // Prevent admin from setting his own id - admin entries are global.
                // If required, remove the surrounding IF condition and admins will act as users
                if (!$isAdmin) {
                    $model->team_id = auth()->user()->team_id;
                }
            });
            if ($isAdmin && $roleid > 1) {
                static::addGlobalScope('team_id', function (Builder $builder) {
                    $field = sprintf('%s.%s', $builder->getQuery()->from, 'team_id');
					
					// To prevent "sql error 1052 column 'id' in where clause is ambiguous",
					// we need to clone "teams" table into "teams_view" and rename column "id" to "id2"
					// CREATE VIEW teams_view AS SELECT id as id2, name, created_at, updated_at, deleted_at, owner_id, kecamatan_id FROM teams;
                    $builder->join("teams_view", $field, "=", "teams_view.id2")-> where("teams_view.kecamatan_id", auth()->user()->kecamatan_id)->orWhereNull($field);
                });
			} else {
                static::addGlobalScope('team_id', function (Builder $builder) {
                    $field = sprintf('%s.%s', $builder->getQuery()->from, 'team_id');

                    $builder->where($field, auth()->user()->team_id)->orWhereNull($field);
                });
            }
        }
    }
}
