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


Route::get('/', [HomeController::class, 'index'])->name('home');

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
    Route::get('/bankaccounts/pdf', [BankAccountController::class, 'exportPdf'])->name('bankaccounts.export_pdf');

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
    Route::get('/{id}/edit', [TagihanController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [TagihanController::class, 'update'])->name('update');
    Route::delete('/{id}/destroy', [TagihanController::class, 'destroy'])->name('destroy');
    Route::post('/{id}/mark-as-paid', [TagihanController::class, 'markAsPaid'])->name('markAsPaid');
    });
        

    // Routing API Laporan
    Route::resource('laporan_keuangan', LaporanKeuanganController::class);
    Route::get('laporan_keuangan/{laporan}/transaksi', [LaporanKeuanganController::class, 'showTransactions'])->name('laporan_keuangan.transactions');
    Route::get('laporan_keuangan/filter/{periode}', [LaporanKeuanganController::class, 'filterByPeriod'])->name('laporan_keuangan.filter');
    Route::get('laporan_keuangan/export', [LaporanKeuanganController::class, 'export'])->name('laporan_keuangan.export');
});