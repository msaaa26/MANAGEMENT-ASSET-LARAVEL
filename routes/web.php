<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\MutasiAsetController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\LaporanController;


Route::get('/', function () {
    return view('auth.login');
});


Route::get('/laporan/aset', [LaporanController::class, 'laporanAset'])->name('laporan.aset');
Route::get('/laporan/mutasi', [LaporanController::class, 'laporanMutasi'])->name('laporan.mutasi');
Route::get('/laporan/aset/pdf', [LaporanController::class, 'cetakPdf'])->name('laporan.aset.pdf');
Route::get('/laporan/mutasi/pdf', [LaporanController::class, 'cetakMutasiPdf'])->name('laporan.mutasi.pdf');
//rute untuk asset
// Route::resource('/asset', AsetController::class);
Route::get('/asset', [AsetController::class, 'index'])->name('asset.index');
Route::get('/asset/create', [AsetController::class, 'create'])->name('asset.create');
Route::post('/asset', [AsetController::class, 'store'])->name('asset.store');
Route::get('/asset/{aset}', [AsetController::class, 'show'])->name('asset.show');
Route::get('/asset/{aset}/edit', [AsetController::class, 'edit'])->name('asset.edit');
Route::put('/asset/{aset}', [AsetController::class, 'update'])->name('asset.update');
Route::delete('/asset/{aset}', [AsetController::class, 'destroy'])->name('asset.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/error', [App\Http\Controllers\ErrorController::class, 'forbidden'])->name('error.403');

//rute untuk mutasi aset
Route::get('/mutasi', [MutasiAsetController::class, 'index'])->name('mutasi.index');
Route::get('/mutasi/create', [MutasiAsetController::class, 'create'])->name('mutasi.create');
Route::post('/mutasi', [MutasiAsetController::class, 'store'])->name('mutasi.store');
Route::get('/mutasi/{mutasiAset}', [MutasiAsetController::class, 'show'])->name('mutasi.show');
Route::get('/mutasi/{mutasiAset}/edit', [MutasiAsetController::class, 'edit'])->name('mutasi.edit');
Route::put('/mutasi/{mutasiAset}', [MutasiAsetController::class, 'update'])->name('mutasi.update');
Route::delete('/mutasi/{mutasiAset}', [MutasiAsetController::class, 'destroy'])->name('mutasi.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        return view('profile.profile');
    })->name('profile.profile');
});

// Route auth dengan Google menggunakan Socialite
Route::get('/auth/redirect', [SocialiteController::class, 'redirect'])->name('auth.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('auth.callback');

Route::middleware(['auth', 'role:admin'])->group(function () {
    //rute untuk category
    Route::resource('category', CategoryController::class);
    //rute untuk location
    Route::resource('location', LocationController::class);
});
