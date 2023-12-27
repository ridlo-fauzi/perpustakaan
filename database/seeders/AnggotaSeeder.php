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
        Anggota::create([
            'id_anggota' => '4001',
            'nama' => 'Wawan',
            'email' => 'wawan@gmail.com',
            'notelp' => '0871111',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Sukoharjo',
        ]);
    }
}
