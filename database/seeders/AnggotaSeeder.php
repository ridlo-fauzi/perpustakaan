<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Anggota::insert(
            [
                [
                    'id_anggota' => '4001',
                    'nama' => 'Wawan',
                    'email' => 'wawan@gmail.com',
                    'notelp' => '08757622594',
                    'jenis_kelamin' => 'Laki-laki',
                    'alamat' => 'Sukoharjo',
                ],
                [
                    'id_anggota' => '4002',
                    'nama' => 'Irfan',
                    'email' => 'irfan@gmail.com',
                    'notelp' => '08931856722',
                    'jenis_kelamin' => 'Laki-laki',
                    'alamat' => 'Pacitan',
                ]
            ],
        );
    }
}
