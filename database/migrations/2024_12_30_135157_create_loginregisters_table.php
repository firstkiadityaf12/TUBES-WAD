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
        Schema::create('loginregisters', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('username'); // Kolom untuk nama
            $table->string('email')->unique(); // Kolom untuk email, pastikan unik
            $table->string('password'); // Kolom untuk password
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loginregisters');
    }
};
