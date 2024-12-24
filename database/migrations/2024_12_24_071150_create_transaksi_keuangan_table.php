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
        Schema::create('transaksi_keuangans', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal_transaksi');
            $table->enum('kategori', ['pemasukan', 'pengeluaran']);
            $table->string('deskripsi');
            $table->float('jumlah');
            $table->enum('metode_bayar', ['tunai', 'transfer']);
            $table->integer('id_akun_bank');
            $table->enum('status', ['berhasil', 'pending', 'gagal']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_keuangans');
    }
};
