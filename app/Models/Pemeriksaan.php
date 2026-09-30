<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $fillable = [
        'user_id',
        'layanan_id',
        'jadwal_layanan_id',
        'no_registrasi',
        'alamat',
        'kelurahan',
        'kota',
        'negara',
        'catatan',
        'status'
    ];

    protected $casts = [
        'tanggal_pemeriksaan' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(
            JadwalLayanan::class,
            'jadwal_layanan_id'
        );
    }
}
