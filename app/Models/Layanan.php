<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Layanan extends Model
{
    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'harga',
        'gambar',
        'deskripsi_singkat',
        'deskripsi_lengkap',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($layanan) {
            $layanan->slug = Str::slug($layanan->nama_layanan);
        });
    }

    public function details()
    {
        return $this->hasMany(LayananDetail::class);
    }

    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }

    public function detailPemeriksaans()
    {
        return $this->hasMany(DetailLayanan::class);
    }

    public function jadwals()
    {
        return $this->hasMany(JadwalLayanan::class);
    }
}
