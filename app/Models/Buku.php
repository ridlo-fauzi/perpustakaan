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

    public function penulis()
    {
        return $this->hasOne(Penulis::class, 'isbn', 'isbn');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak', 'id_rak');
    }

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit', 'id_penerbit');
    }
}
