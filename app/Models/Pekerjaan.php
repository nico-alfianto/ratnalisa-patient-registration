<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    protected $table = 'pekerjaans';

    protected $fillable = [
        'nama_pekerjaan'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
