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
<<<<<<< HEAD
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
Route::get('/transactions/search', [TransactionController::class, 'search'])->name('transactions.search');
=======
Route::get('transactions/{transactions}/read', [TransactionController::class, 'read'])->name('transactions.read');
Route::get('transactions/kategori/{kategori}', [TransactionController::class, 'filterByCategory'])->name('transactions.filterByCategory');
Route::get('transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::get('transactions/{transactions}/laporan', [TransactionController::class, 'laporanKeuangan'])->name('transactions.laporan');
Route::get('transactions/statistik', [TransactionController::class, 'getStatistics'])->name('transactions.statistics');
Route::get('transactions/metode/{metode}', [TransactionController::class, 'filterByPaymentMethod'])->name('transactions.filterByPaymentMethod');
>>>>>>> fc8e7fcf07220e2e65fd6b1f933260e1df56f5f0

// Routing API Bank Account
Route::resource('bankaccounts', BankAccountController::class);

// Routing API Tagihan
Route::resource('tagihan', TagihanController::class);
Route::get('tagihan/{tagihan}/read', [TagihanController::class, 'read'])->name('tagihan.read');
Route::get('tagihan/status/{status}', [TagihanController::class, 'filterByStatus'])->name('tagihan.filterByStatus');
Route::get('tagihan/jenis/{jenis}', [TagihanController::class, 'filterByType'])->name('tagihan.filterByType');
Route::get('tagihan/laporan', [TagihanController::class, 'generateReport'])->name('tagihan.laporan');
Route::post('tagihan/{tagihan}/bayar', [TagihanController::class, 'pay'])->name('tagihan.pay');

// Routing API Laporan
Route::resource('laporan_keuangan', LaporanKeuanganController::class);
Route::get('laporan_keuangan/{laporan}/transaksi', [LaporanKeuanganController::class, 'showTransactions'])->name('laporan_keuangan.transactions');
Route::get('laporan_keuangan/filter/{periode}', [LaporanKeuanganController::class, 'filterByPeriod'])->name('laporan_keuangan.filter');
Route::get('laporan_keuangan/export', [LaporanKeuanganController::class, 'export'])->name('laporan_keuangan.export');

