<?php

use Illuminate\Support\Facades\Route;
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
Route::resource('tagihan', TagihanController::class);
Route::get('tagihan/{tagihan}/read', [TagihanController::class, 'read'])->name('tagihan.read');
Route::get('tagihan/status/{status}', [TagihanController::class, 'filterByStatus'])->name('tagihan.filterByStatus');
Route::get('tagihan/jenis/{jenis}', [TagihanController::class, 'filterByType'])->name('tagihan.filterByType');
Route::get('tagihan/laporan', [TagihanController::class, 'generateReport'])->name('tagihan.laporan');
Route::post('tagihan/{tagihan}/bayar', [TagihanController::class, 'pay'])->name('tagihan.pay');

// Routing API Laporan
