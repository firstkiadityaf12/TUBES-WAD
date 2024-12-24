<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\TransaksiKeuanganController;
use App\Http\Controllers\PengeluaranController;

// Route ke halaman utama (opsional, bisa diarahkan ke Pemasukan)
Route::get('/', function () {
    return redirect()->route('pemasukan.index');
});

// CRUD Resource Route untuk Pemasukan
Route::resource('pemasukan', PemasukanController::class);

// Tambahan route untuk detail pemasukan (readPemasukan)
Route::get('pemasukan/{pemasukan}/read', [PemasukanController::class, 'read'])
    ->name('pemasukan.read');

// CRUD Resource Route untuk Transaksi Keuangan
Route::resource('transaksi_keuangan', TransaksiKeuanganController::class);

// Tambahan route untuk detail transaksi (readTransaksi)
Route::get('transaksi_keuangan/{transaksi}/read', [TransaksiKeuanganController::class, 'read'])
    ->name('transaksi_keuangan.read');

// Tambahan route untuk filter data berdasarkan kategori (opsional)
Route::get('transaksi_keuangan/kategori/{kategori}', [TransaksiKeuanganController::class, 'filterByCategory'])
    ->name('transaksi_keuangan.filterByCategory');

// Tambahan route untuk laporan keuangan terkait transaksi
Route::get('transaksi_keuangan/{transaksi}/laporan', [TransaksiKeuanganController::class, 'laporanKeuangan'])
    ->name('transaksi_keuangan.laporan');

// Route untuk mendapatkan data statistik atau analisis (opsional)
Route::get('transaksi_keuangan/statistik', [TransaksiKeuanganController::class, 'getStatistics'])
    ->name('transaksi_keuangan.statistics');

// Tambahan untuk transaksi keuangan berdasarkan metode bayar
Route::get('transaksi_keuangan/metode/{metode}', [TransaksiKeuanganController::class, 'filterByPaymentMethod'])
    ->name('transaksi_keuangan.filterByPaymentMethod');
