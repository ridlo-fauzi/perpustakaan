<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $fillable = [
        'id_category',
        'nama_category',
        'deskripsi'
    ];

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_category', 'id_category');
    }
}
