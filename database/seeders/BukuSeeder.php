<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buku::insert(
            [
                [
                    'isbn' => '978-602-8519-93-9',
                    'id_rak' => '6702',
                    'id_category' => '5201',
                    'judul' => 'Mengenal Tumbuhan Indonesia',
                    'sinopsis' => 'Buku ini memberikan informasi mengenai tumbuhan Indonesia, mencakup klasifikasi, morfologi, dan habitat.',
                    'tahun_terbit' => '2002',
                    'jumlah_halaman' => '93',
                    'id_penerbit' => '3801'
                ],
                [
                    'isbn' => '984-623-8452-95-4',
                    'id_rak' => '6701',
                    'id_category' => '5202',
                    'judul' => 'Rahasia Sang Penyair Malam',
                    'sinopsis' => 'Seorang penyair malam yang misterius memiliki kekuatan untuk menghidupkan kata-kata menjadi kenyataan. Namun, dia menyimpan rahasia yang tak terduga, dan kisahnya menjadi semakin rumit ketika seorang pembaca mencoba mengungkap misteri di balik kata-katanya.',
                    'tahun_terbit' => '2017',
                    'jumlah_halaman' => '278',
                    'id_penerbit' => '3802'
                ],
                [
                    'isbn' => '988-624-8432-97-8',
                    'id_rak' => '6701',
                    'id_category' => '5203',
                    'judul' => 'Sejarah Dunia yang Disembunyikan',
                    'sinopsis' => 'Buku ini menyajikan sejarah dunia dari perspektif yang berbeda dan membeberkan fakta-fakta yang mungkin terlupakan.',
                    'tahun_terbit' => '2020',
                    'jumlah_halaman' => '488',
                    'id_penerbit' => '3802'
                ]
            ]
        );
    }
}
