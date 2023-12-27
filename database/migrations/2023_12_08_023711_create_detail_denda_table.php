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
        Schema::create('detail_denda', function (Blueprint $table) {
            $table->string('id_detail_denda')->primary();
            $table->string('id_detail_peminjaman');
            $table->string('nama_denda');
            $table->decimal('nominal_denda', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_denda');
    }
};