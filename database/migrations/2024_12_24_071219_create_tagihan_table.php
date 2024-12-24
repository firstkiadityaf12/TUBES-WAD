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
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tagihan');
            $table->string('tanggal_jatuh_tempo');
            $table->float('jumlah_tagihan');
            $table->enum('status', ['dibayar', 'belum dibayar']);
            $table->string('catatan');
            $table->integer('id_akun_bank');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihans');
    }
};
