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

    protected $fillable = [
        'namadonatur',
        'nomorhp',
        'zakatprofesi',
        'zakatmaal',
        'infaq',
        'sedekah',
        'wakafpendidikan',
        'wakafproduktif',
        'infaqkesehatan',
        'namabank_id',
        'verifiedstatus_id',
        'created_at',
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

    public function verifiedstatus()
    {
        return $this->belongsTo(VerifiedStatus::class, 'verifiedstatus_id');
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
