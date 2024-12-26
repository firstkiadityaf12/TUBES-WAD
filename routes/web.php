<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanKeuanganController;

use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\TagihanController;


// Route ke halaman utama (opsional, bisa diarahkan ke Pemasukan)
Route::get('/', function () {
    return redirect()->route('pemasukan.index');
});

// Routing API Pemasukan
Route::resource('pemasukan', PemasukanController::class);
Route::get('pemasukan/{pemasukan}/read', [PemasukanController::class, 'read'])->name('pemasukan.read');

// Routing API Pengeluaran
Route::resource('pengeluaran', PengeluaranController::class);

// Routing API Transaction
Route::get('/transactions', [TransactionController::class, 'index']) -> name('transactions.index');
Route::get('transactions/{transactions}/read', [TransactionController::class, 'read'])->name('transactions.read');
Route::get('transactions/kategori/{kategori}', [TransactionController::class, 'filterByCategory'])->name('transactions.filterByCategory');
Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::get('transactions/{transactions}/laporan', [TransactionController::class, 'laporanKeuangan'])->name('transactions.laporan');
Route::get('transactions/statistik', [TransactionController::class, 'getStatistics'])->name('transactions.statistics');
Route::get('transactions/metode/{metode}', [TransactionController::class, 'filterByPaymentMethod'])->name('transactions.filterByPaymentMethod');

// Routing API Bank Account
Route::resource('akun_banks', PengeluaranController::class);

// Routing API Tagihan
Route::resource('tagihan', PengeluaranController::class);

// Routing API Laporan
Route::resource('laporan_keuangan', LaporanKeuanganController::class);
Route::get('laporan_keuangan/{laporan}/transaksi', [LaporanKeuanganController::class, 'showTransactions'])->name('laporan_keuangan.transactions');
Route::get('laporan_keuangan/filter/{periode}', [LaporanKeuanganController::class, 'filterByPeriod'])->name('laporan_keuangan.filter');
Route::get('laporan_keuangan/export', [LaporanKeuanganController::class, 'export'])->name('laporan_keuangan.export');
Route::get('laporan_keuangan/create', [LaporanKeuanganController::class, 'create'])->name('laporan_keuangan.create');
