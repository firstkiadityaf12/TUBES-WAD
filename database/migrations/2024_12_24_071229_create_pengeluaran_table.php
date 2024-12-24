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
        Schema::create('pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_pengeluaran');
            $table->string('sumber_pengeluaran');
            $table->float('jumlah_pengeluaran');
            $table->string('deskripsi');
            $table->unsignedBigInteger('id_akun_bank');
            $table->timestamps();

            $table->foreign('id_akun_bank')->references('id')->on('akun_banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
