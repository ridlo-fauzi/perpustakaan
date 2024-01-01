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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->string('id_peminjaman')->primary();
            $table->unsignedBigInteger('id_petugas');
            $table->string('id_anggota');
            $table->date('tanggal_pinjam');
            $table->timestamps();

            $table->foreign('id_petugas')->references('id_user')->on('users');
            $table->foreign('id_anggota')->references('id_anggota')->on('anggota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
