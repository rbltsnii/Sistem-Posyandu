<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\PenimbanganController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Authentication
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard & Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Modul Data (Balita, Penimbangan, Imunisasi)
    // Semua user (Admin & Pengguna) bisa LIHAT data
    // Hanya Admin yang bisa UBAH data (Create, Store, Edit, Update, Destroy)

    // Public Read-Only for Auth Users
    Route::get('balitas', [BalitaController::class, 'index'])->name('balitas.index');
    Route::get('balitas/{balita}', [BalitaController::class, 'show'])->name('balitas.show')->whereNumber('balita');
    
    Route::get('penimbangans', [PenimbanganController::class, 'index'])->name('penimbangans.index');
    Route::get('penimbangans/{penimbangan}', [PenimbanganController::class, 'show'])->name('penimbangans.show')->whereNumber('penimbangan');
    
    Route::get('imunisasies', [ImunisasiController::class, 'index'])->name('imunisasies.index');
    Route::get('imunisasies/{imunisasi}', [ImunisasiController::class, 'show'])->name('imunisasies.show')->whereNumber('imunisasi');

    // Admin Only Actions
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('users', UserController::class);

        // Balita Write Actions
        Route::get('balitas/create', [BalitaController::class, 'create'])->name('balitas.create');
        Route::post('balitas', [BalitaController::class, 'store'])->name('balitas.store');
        Route::get('balitas/{balita}/edit', [BalitaController::class, 'edit'])->name('balitas.edit');
        Route::put('balitas/{balita}', [BalitaController::class, 'update'])->name('balitas.update');
        Route::delete('balitas/{balita}', [BalitaController::class, 'destroy'])->name('balitas.destroy');

        // Penimbangan Write Actions (using resource except index/show to avoid duplicate)
        Route::resource('penimbangans', PenimbanganController::class)->except(['index', 'show']);

        // Imunisasi Write Actions
        Route::resource('imunisasies', ImunisasiController::class)->except(['index', 'show']);
    });
});
