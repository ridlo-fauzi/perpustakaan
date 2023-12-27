<?php
namespace App\Enums;
 
enum RoleEnum: string
{
    case admin = 'admin';
    case bagPeminjaman = 'bagPeminjaman';
    case bagPengelolaanBuku = 'bagPengelolaanBuku';
}