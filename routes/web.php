<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

// Authentication Routes
Auth::routes();

// Home Route
Route::get('/', function () {
    return view('layouts.dashboard');
})->name('home');

// Protected Routes (require authentication)
Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class);
    Route::resource('pengarang', PengarangController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::get('peminjaman/kembali/{id}', [PeminjamanController::class, 'pengembalian'])->name('peminjaman.kembali');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
