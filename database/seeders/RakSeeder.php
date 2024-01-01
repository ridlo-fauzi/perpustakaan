<?php

namespace Database\Seeders;

use App\Models\Rak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rak::insert(
            [
                [
                    'id_rak' => '6701',
                    'nama_rak' => 'Rak kuning'
                ],
                [
                    'id_rak' => '6702',
                    'nama_rak' => 'Rak merah',
                ],
                [
                    'id_rak' => '6703',
                    'nama_rak' => 'Rak biru'
                ]
            ]

        );
    }
}
