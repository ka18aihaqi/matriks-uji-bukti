<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemeriksaanController;

// Hanya bisa diakses jika belum login
Route::get('/', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

// Hanya bisa diakses jika sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/export-pdf/{id}', [DashboardController::class, 'exportPdf'])->name('dashboard.exportPdf');
    Route::post('/dashboard/bulk-action', [DashboardController::class, 'handleBulkAction'])->name('dashboard.bulkAction');

    // Tambahkan route lainnya di sini...
    Route::get('/perekaman', [PemeriksaanController::class, 'index'])->name('perekaman');
    Route::get('/perekaman/create', [PemeriksaanController::class, 'create'])->name('perekaman.create');
    Route::post('/perekaman', [PemeriksaanController::class, 'store'])->name('perekaman.store');
    Route::get('/perekaman/{pemeriksaan}', [PemeriksaanController::class, 'show'])->name('perekaman.show');
    Route::get('/perekaman/edit/{pemeriksaan}', [PemeriksaanController::class, 'edit'])->name('perekaman.edit');
    Route::put('/perekaman/{pemeriksaan}', [PemeriksaanController::class, 'update'])->name('perekaman.update');
    Route::post('/perekaman/{pemeriksaan}', [PemeriksaanController::class, 'destroy'])->name('perekaman.destroy');
});

require __DIR__.'/auth.php';
