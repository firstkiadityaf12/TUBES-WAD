<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\LaporanKeuanganController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;


// Route ke halaman utama (opsional, bisa diarahkan ke Pemasukan)
// Route::get('/', function () {
//     return redirect()->route('pemasukan.index');
// });

// landing page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home');

// Routing login dan register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk dashboard (hanya user login yang bisa akses)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


    Route::resource('pemasukan', PemasukanController::class);
    Route::resource('pengeluaran', PengeluaranController::class);

    Route::resource('bankaccounts', BankAccountController::class);
    Route::get('/bankaccounts/pdf', [BankAccountController::class, 'exportPdf'])->name('bankaccounts.pdf');

    // Routing API Transaction
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::get('/transactions/search', [TransactionController::class, 'search'])->name('transactions.search');

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
    Route::get('/laporan_keuangan', [LaporanKeuanganController::class, 'index'])->name('laporan_keuangan.index');
    Route::get('/laporan_keuangan/create', [LaporanKeuanganController::class, 'create'])->name('laporan_keuangan.create');
    Route::post('/laporan_keuangan', [LaporanKeuanganController::class, 'store'])->name('laporan_keuangan.store');
    Route::get('/laporan_keuangan/{id}/edit', [LaporanKeuanganController::class, 'edit'])->name('laporan_keuangan.edit');
    Route::put('/laporan_keuangan/{id}', [LaporanKeuanganController::class, 'update'])->name('laporan_keuangan.update');
    Route::delete('/laporan_keuangan/{id}', [LaporanKeuanganController::class, 'destroy'])->name('laporan_keuangan.destroy');
    Route::get('/laporan_keuangan/{id}/show', [LaporanKeuanganController::class, 'show'])->name('laporan_keuangan.show');
    Route::get('/laporan_keuangan/{id}/export_detail_pdf', [LaporanKeuanganController::class, 'exportDetailPdf'])->name('laporan_keuangan.export_detail_pdf');
    Route::get('/laporan_keuangan/chart', [LaporanKeuanganController::class, 'chart'])->name('laporan_keuangan.chart');
    Route::get('/laporan_keuangan/pdf', [LaporanKeuanganController::class, 'exportPdf'])->name('laporan_keuangan.pdf');

});