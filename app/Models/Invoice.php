<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'pemeriksaan_id',
        'nomor_invoice',
        'tanggal_invoice',
        'total_tagihan',
        'status',
    ];

    protected $casts = [
        'tanggal_invoice' => 'date'
    ];

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }
}
