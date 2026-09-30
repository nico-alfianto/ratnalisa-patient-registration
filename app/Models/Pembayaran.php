<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'pemeriksaan_id',
        'kode_pembayaran',
        'total_bayar',
        'metode_pembayaran',
        'midtrans_order_id',
        'snap_token',
        'status',
        'expired_at'
    ];

    protected $casts = [
        'expired_at' => 'datetime'
    ];

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }
}
