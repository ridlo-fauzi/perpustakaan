<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $table = 'penerbit';
    protected $fillable = [
        'id_penerbit',
        'nama_penerbit'
    ];

    public function penerbit()
    {
        return $this->hasMany(Buku::class, 'id_penerbit', 'id_penerbit');
    }
}