<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('redeem_items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama item, misal: "Sertifikat Digital"
            $table->text('description')->nullable(); // Deskripsi singkat
            $table->unsignedInteger('points_cost'); // Harga dalam poin
            $table->boolean('is_active')->default(true); // Untuk mengaktifkan/menonaktifkan item
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redeem_items');
    }
};