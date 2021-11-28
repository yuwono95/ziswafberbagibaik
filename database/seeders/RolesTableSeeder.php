<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Admin DPD',
            ],
            [
                'id'    => 3,
                'title' => 'Admin DPC',
            ],
            [
                'id'    => 4,
                'title' => 'Admin UPA',
            ],
            [
                'id'    => 5,
                'title' => 'Anggota',
            ],
            [
                'id'    => 6,
                'title' => 'Relawan',
            ],
        ];

        Role::insert($roles);
    }
}
