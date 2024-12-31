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
Route::get('pemasukan/{pemasukan}/show', [PemasukanController::class, 'show'])->name('pemasukan.show');
Route::get('/pemasukan/{pemasukan}/edit', [PemasukanController::class, 'edit'])->name('pemasukan.edit');

// Routing API Pengeluaran
Route::resource('pengeluaran', PengeluaranController::class);
Route::get('/pengeluarans/{pengeluaran}', [PengeluaranController::class, 'show'])->name('pengeluaran.show');
Route::get('/pengeluarans/{pengeluaran}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
Route::delete('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');


// Routing API Transaction
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('/transactions/search', [TransactionController::class, 'search'])->name('transactions.search');

// Routing API Bank Account
Route::resource('bankaccounts', BankAccountController::class);

// Routing API Tagihan
Route::prefix('tagihan')->name('tagihan.')->group(function () {
Route::get('/', [TagihanController::class, 'index'])->name('index');
Route::get('/create', [TagihanController::class, 'create'])->name('create');
Route::post('/store', [TagihanController::class, 'store'])->name('store');
Route::get('/{tagihan}/edit', [TagihanController::class, 'edit'])->name('edit');
Route::get('/{tagihan}', [TagihanController::class, 'show'])->name('show');
Route::put('/{tagihan}', [TagihanController::class, 'update'])->name('update');
Route::delete('/{tagihan}', [TagihanController::class, 'destroy'])->name('destroy');
Route::get('/export-pdf', [TagihanController::class, 'exportPdf'])->name('exportPdf');
});

// Routing API Laporan
Route::resource('laporan_keuangan', LaporanKeuanganController::class);
Route::get('laporan_keuangan/{laporan}/transaksi', [LaporanKeuanganController::class, 'showTransactions'])->name('laporan_keuangan.transactions');
Route::get('laporan_keuangan/filter/{periode}', [LaporanKeuanganController::class, 'filterByPeriod'])->name('laporan_keuangan.filter');
Route::get('laporan_keuangan/export', [LaporanKeuanganController::class, 'export'])->name('laporan_keuangan.export');

