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
        Schema::create('akun_banks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bank');
            $table->integer('nomor_rekening');
            $table->string('nama_pemilik');
            $table->float('saldo');
            $table->string('tanggal_ditambahkan');
            $table->string('tanggal_diubah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_banks');
    }
};
