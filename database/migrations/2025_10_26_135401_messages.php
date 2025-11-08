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
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // Corresponds to `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
            $table->string('name'); // Corresponds to `name` varchar(255) NOT NULL
            $table->string('email'); // Corresponds to `email` varchar(255) NOT NULL
            $table->string('subject'); // Corresponds to `subject` varchar(255) NOT NULL
            $table->text('body'); // Corresponds to `message` text NOT NULL
            $table->timestamps(); // Corresponds to `created_at` and `updated_at` timestamp NULL DEFAULT NULL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};