<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert(
            [
                [
                    'id_category' => '5201',
                    'nama_category' => 'Sains',
                    'deskripsi' => 'membahas konsep-konsep ilmiah, penelitian, dan penemuan. Ini melibatkan berbagai topik seperti fisika, kimia, biologi, dan astronomi'
                ],
                [
                    'id_category' => '5202',
                    'nama_category' => 'Fiksi',
                    'deskripsi' => 'mencakup cerita yang diimajinasikan atau bersifat khayalan. Ini termasuk novel, cerita pendek, dan drama yang menceritakan kisah-kisah yang tidak benar-benar terjadi.'
                ],
                [
                    'id_category' => '5203',
                    'nama_category' => 'Sejarah',
                    'deskripsi' => 'mencakup buku-buku yang membahas peristiwa sejarah, baik secara umum maupun topik tertentu'
                ]
            ]
        );
    }
}
