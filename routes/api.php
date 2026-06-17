<?php

use App\Http\Controllers\Api\JemaatController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\KeuanganController;
use App\Http\Controllers\Api\InventarisController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->name('api.')->group(function () {
    // Modul A: Jemaat
    Route::apiResource('jemaat', JemaatController::class);
    
    // Modul B: Jadwal Pelayanan
    Route::get('jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::post('jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    
    // Modul C: Inventaris
    Route::get('inventaris', [InventarisController::class, 'index'])->name('inventaris.index');
    Route::post('inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::get('inventaris/report', [InventarisController::class, 'report'])->name('inventaris.report');
    
    // Modul D: Keuangan
    Route::get('keuangan', [KeuanganController::class, 'index'])->name('keuangan.index');
    Route::post('keuangan', [KeuanganController::class, 'store'])->name('keuangan.store');
    Route::get('keuangan/report', [KeuanganController::class, 'report'])->name('keuangan.report');
});
