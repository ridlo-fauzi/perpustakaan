<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $fillable = [
        'isbn',
        'id_rak',
        'id_category',
        'judul',
        'sinopsis',
        'tahun_terbit',
        'jumlah_halaman',
        'id_penerbit',
    ];
}
