<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Web\JemaatController;
use App\Http\Controllers\Web\JadwalController;
use App\Http\Controllers\Web\KeuanganController;
use App\Http\Controllers\Web\InventarisController;
use App\Http\Controllers\Web\SakramenController;
use App\Http\Controllers\Web\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Modul Admin: Jemaat, Sakramen, Inventaris
    Route::middleware(['role:Admin'])->group(function () {
        Route::resource('jemaat', JemaatController::class);
        Route::get('jemaat-report', [JemaatController::class, 'report'])->name('jemaat.report');

        Route::resource('inventaris', InventarisController::class);
        Route::get('inventaris-report', [InventarisController::class, 'report'])->name('inventaris.report');

        Route::resource('sakramen', SakramenController::class);
    });

    // Modul Koordinator: Jadwal & Petugas
    Route::middleware(['role:Koordinator'])->group(function () {
        Route::resource('jadwal', JadwalController::class);
        Route::get('jadwal-petugas', [JadwalController::class, 'petugas'])->name('jadwal.petugas');
    });

    // Modul Bendahara: Keuangan & Laporan
    Route::middleware(['role:Bendahara'])->group(function () {
        Route::resource('keuangan', KeuanganController::class);
        Route::get('keuangan-report', [KeuanganController::class, 'report'])->name('keuangan.report');
    });
});
