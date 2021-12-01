<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiPerolehan extends Model
{
    use HasFactory;

    public $table = 'verifikasi_perolehans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'verificator_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function verificator()
    {
        return $this->belongsTo(InputPerolehan::class, 'verificator_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
