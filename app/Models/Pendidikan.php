<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikans';

    protected $fillable = [
        'nama_pendidikan'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
