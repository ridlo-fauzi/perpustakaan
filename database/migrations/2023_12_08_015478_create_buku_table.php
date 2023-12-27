<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->string('isbn')->primary();
            $table->string('id_rak');
            $table->string('id_category');
            $table->string('judul');
            $table->text('sinopsis');
            $table->integer('tahun_terbit');
            $table->integer('jumlah_halaman');
            $table->string('id_penerbit');
            $table->timestamps();

            $table->foreign('id_rak')->references('id_rak')->on('rak');
            $table->foreign('id_category')->references('id_category')->on('category');
            $table->foreign('id_penerbit')->references('id_penerbit')->on('penerbit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
