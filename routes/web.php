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
// Route::resource('tagihan', TagihanController::class);
// Route::get('tagihan/{tagihan}/read', [TagihanController::class, 'read'])->name('tagihan.read');
// Route::get('tagihan/status/{status}', [TagihanController::class, 'filterByStatus'])->name('tagihan.filterByStatus');
// Route::get('tagihan/jenis/{jenis}', [TagihanController::class, 'filterByType'])->name('tagihan.filterByType');
// Route::get('tagihan/laporan', [TagihanController::class, 'generateReport'])->name('tagihan.laporan');
// Route::post('tagihan/{tagihan}/bayar', [TagihanController::class, 'pay'])->name('tagihan.pay');
Route::prefix('tagihan')->name('tagihan.')->group(function () {
Route::get('/', [TagihanController::class, 'index'])->name('index');
Route::get('/create', [TagihanController::class, 'create'])->name('create');
Route::post('/store', [TagihanController::class, 'store'])->name('store');
Route::get('/{id}/edit', [TagihanController::class, 'edit'])->name('edit');
Route::put('/{id}/update', [TagihanController::class, 'update'])->name('update');
Route::delete('/{id}/destroy', [TagihanController::class, 'destroy'])->name('destroy');
Route::post('/{id}/mark-as-paid', [TagihanController::class, 'markAsPaid'])->name('markAsPaid');
});

// Routing API Laporan
Route::get('/laporan_keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan_keuangan.index');
Route::get('/laporan_keuangan/create', [LaporanKeuanganController::class, 'create'])->name('laporan_keuangan.create');
Route::post('/laporan_keuangan', [LaporanKeuanganController::class, 'store'])->name('laporan_keuangan.store');
Route::get('/laporan_keuangan/{id}/edit', [LaporanKeuanganController::class, 'edit'])->name('laporan_keuangan.edit');
Route::put('/laporan_keuangan/{id}', [LaporanKeuanganController::class, 'update'])->name('laporan_keuangan.update');
Route::delete('/laporan_keuangan/{id}', [LaporanKeuanganController::class, 'destroy'])->name('laporan_keuangan.destroy');
Route::get('/laporan_keuangan/pdf', [LaporanKeuanganController::class, 'exportPdf'])->name('laporan_keuangan.export_pdf');
Route::get('/laporan_keuangan/chart', [LaporanKeuanganController::class, 'chart'])->name('laporan_keuangan.chart');
Route::get('/laporan_keuangan/{id}/show', [LaporanKeuanganController::class, 'show'])->name('laporan_keuangan.show');
Route::get('/laporan_keuangan/{id}/export_detail_pdf', [LaporanKeuanganController::class, 'exportDetailPdf'])->name('laporan_keuangan.export_detail_pdf');










