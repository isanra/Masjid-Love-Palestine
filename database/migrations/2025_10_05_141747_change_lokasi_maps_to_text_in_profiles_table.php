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
        Schema::table('profiles', function (Blueprint $table) {
            // Mengubah kolom lokasi_maps menjadi tipe TEXT
            $table->text('lokasi_maps')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            // Mengembalikan kolom ke tipe VARCHAR(255) jika di-rollback
            $table->string('lokasi_maps')->nullable()->change();
        });
    }
};