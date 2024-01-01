<?php

namespace Database\Seeders;

use App\Models\Penerbit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penerbit::insert(
            [
                [
                    'id_penerbit' => '3801',
                    'nama_penerbit' => 'Harmoni Media'
                ],
                [
                    'id_penerbit' => '3802',
                    'nama_penerbit' => 'Khatulistiwa Books',
                ],
                [
                    'id_penerbit' => '3803',
                    'nama_penerbit' => 'Mitra Sejahtera Pustaka'
                ]
            ]
        );
    }
}
