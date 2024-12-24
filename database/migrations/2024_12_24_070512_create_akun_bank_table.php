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
     * Varieble akun bank
     * id_bank integer
     * nama_bank string
     * nomor_rekening integer
     * nama_pemilik string
     * saldo float
     * tanggal_ditambahkan string
     * tanggal_diubah string
     * 
     */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_banks');
    }
};
