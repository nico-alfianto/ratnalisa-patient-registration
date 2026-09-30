<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLayanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'layanan_id',
        'hari',
        'sesi',
        'kuota'
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}
