<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class InputPerolehan extends Model implements HasMedia
{
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'input_perolehans';

    public static $searchable = [
        'namadonatur',
        'nomorhp',
    ];

    protected $appends = [
        'buktitransfer',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [];
	
	$fillable = [
		'namadonatur',
		'nomorhp',
		'zakatprofesi',
		'zakatmaal',
		'infaq',
		'sedekah',
		'wakafpendidikan',
		'wakafproduktif',
		'created_at',
		'infaqkesehatan',
		'namabank_id',
		'updated_at',
		'deleted_at',
		'team_id',
	];		

	$fillable_admin = [
		'namadonatur',
		'nomorhp',
		'zakatprofesi',
		'zakatmaal',
		'infaq',
		'sedekah',
		'wakafpendidikan',
		'wakafproduktif',
		'created_at',
		'infaqkesehatan',
		'namabank_id',
		'verified',
		'updated_at',
		'deleted_at',
		'team_id',
	];
	
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function namabank()
    {
        return $this->belongsTo(Bank::class, 'namabank_id');
    }

    public function getBuktitransferAttribute()
    {
        $file = $this->getMedia('buktitransfer')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
