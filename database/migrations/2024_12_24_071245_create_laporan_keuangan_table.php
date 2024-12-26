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
        Schema::create('laporan_keuangans', function (Blueprint $table) {
            $table->id();
            $table->string('periode_laporan');
            $table->float('total_pemasukan');
            $table->float('total_pengeluaran');
            $table->float('saldo_akhir');
            $table->string('catatan');
            $table->datetime('tanggal_pembuatan');
            $table->datetime('tanggal_diubah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_keuangans');
    }
};
