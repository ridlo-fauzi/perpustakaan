<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;

    protected $table = 'rak';
    protected $fillable = [
        'id_rak',
        'nama_rak'
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_rak', 'id_rak');
    }
}
