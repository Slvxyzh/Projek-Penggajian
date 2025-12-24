<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

// ===============================
// AUTH
// ===============================
Route::get('/', fn () => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ===============================
// DASHBOARD (ADMIN & PEGAWAI)
// ===============================
Route::get('/dashboard', [BerandaController::class, 'index'])
    ->middleware(['auth', 'role:admin,pegawai'])
    ->name('dashboard');


// ===============================
// PEGAWAI (CRUD - ADMIN ONLY)
// ===============================
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');

    Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])
        ->whereNumber('id')
        ->name('pegawai.edit');

    Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])
        ->whereNumber('id')
        ->name('pegawai.update');

    Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])
        ->whereNumber('id')
        ->name('pegawai.destroy');
});


// ===============================
// JABATAN (ADMIN ONLY)
// ===============================
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
    Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store');

    Route::put('/jabatan/{id}', [JabatanController::class, 'update'])
        ->whereNumber('id')
        ->name('jabatan.update');

    Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])
        ->whereNumber('id')
        ->name('jabatan.destroy');
});
