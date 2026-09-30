<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananDetail extends Model
{
    protected $fillable = [
        'layanan_id',
        'icon',
        'judul',
        'deskripsi'
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
