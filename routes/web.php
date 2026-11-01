<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LaporController;
use Illuminate\Support\Facades\Route;

// ---- Warga (publik) ----
Route::get('/', fn () => redirect()->route('lapor.create'));
Route::get('/lapor', [LaporController::class, 'create'])->name('lapor.create');
Route::post('/lapor', [LaporController::class, 'store'])->name('lapor.store');

// ---- Login & registrasi petugas ----
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:5,1');
});

// ---- Logout (harus sudah login) ----
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ---- Petugas (wajib login) ----
Route::middleware('auth')->group(function () {
    Route::resource('laporan', LaporanController::class)
        ->only(['index', 'show', 'edit', 'update', 'destroy']);
});