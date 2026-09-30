<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailLayanan extends Model
{
    protected $fillable = [
        'layanan_id',
        'nama_pemeriksaan'
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
