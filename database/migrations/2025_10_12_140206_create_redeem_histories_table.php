<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('redeem_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Menunjuk ke item spesifik yang ditukar
            $table->foreignId('redeem_item_id')->constrained()->onDelete('cascade');
            // Mencatat harga poin saat itu, jika harga item berubah di masa depan
            $table->unsignedInteger('points_redeemed');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redeem_histories');
    }
};