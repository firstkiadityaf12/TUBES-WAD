<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\LaporanKeuanganController;


// Route ke halaman utama (opsional, bisa diarahkan ke Pemasukan)
Route::get('/', function () {
    return redirect()->route('pemasukan.index');
});

// Routing API Pemasukan
Route::resource('pemasukan', PemasukanController::class);
Route::get('pemasukan/{pemasukan}/read', [PemasukanController::class, 'read'])->name('pemasukan.read');

// Routing API Pengeluaran
Route::resource('pengeluaran', PengeluaranController::class);
Route::get('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'show'])->name('pengeluaran.show');
Route::get('/pengeluaran/{pengeluaran}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');


// Routing API Transaction
Route::resource('transactions', TransactionController::class);
Route::get('transactions/{transactions}/read', [TransactionController::class, 'read'])->name('transactions.read');
Route::get('transactions/kategori/{kategori}', [TransactionController::class, 'filterByCategory'])->name('transactions.filterByCategory');
Route::get('transactions/{transactions}/laporan', [TransactionController::class, 'laporanKeuangan'])->name('transactions.laporan');
Route::get('transactions/statistik', [TransactionController::class, 'getStatistics'])->name('transactions.statistics');
Route::get('transactions/metode/{metode}', [TransactionController::class, 'filterByPaymentMethod'])->name('transactions.filterByPaymentMethod');

// Routing untuk pencarian transaksi
Route::get('/transactions/search', [TransactionController::class, 'search'])->name('transactions.search');

// Routing API Bank Account
Route::resource('akun_banks', BankAccountController::class);


// Routing API Tagihan
Route::resource('tagihan', TagihanController::class);

// Routing API Laporan
Route::resource('laporan_keuangan', LaporanKeuanganController::class);
Route::get('laporan_keuangan/{laporan}/transaksi', [LaporanKeuanganController::class, 'showTransactions'])->name('laporan_keuangan.transactions');
Route::get('laporan_keuangan/filter/{periode}', [LaporanKeuanganController::class, 'filterByPeriod'])->name('laporan_keuangan.filter');
Route::get('laporan_keuangan/export', [LaporanKeuanganController::class, 'export'])->name('laporan_keuangan.export');
