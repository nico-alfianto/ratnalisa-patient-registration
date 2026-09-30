<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = [
        'nama',
        'spesialis_id',
        'foto',
        'deskripsi',
        'pengalaman'
    ];

    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class);
    }
}
