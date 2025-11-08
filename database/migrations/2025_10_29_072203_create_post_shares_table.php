<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            // user_id bisa null jika tamu yang share atau kita tidak track user
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); 
            $table->ipAddress('ip_address')->nullable(); // Optional: lacak IP jika tamu
            $table->string('platform')->nullable(); // Optional: lacak platform (facebook, twitter, copy_link, etc.)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_shares');
    }
};