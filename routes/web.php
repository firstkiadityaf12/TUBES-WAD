<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemasukanController;



// Route ke halaman utama (opsional, bisa diarahkan ke Pemasukan)
Route::get('/', function () {
    return redirect()->route('pemasukan.index');
});

// CRUD Resource Route untuk Pemasukan
Route::resource('pemasukan', PemasukanController::class);

// Tambahan route untuk detail pemasukan (readPemasukan)
Route::get('pemasukan/{pemasukan}/read', [PemasukanController::class, 'read'])
    ->name('pemasukan.read');
