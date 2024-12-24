<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;

// Route ke halaman utama
Route::get('/', function () {
    return view('welcome');
});
