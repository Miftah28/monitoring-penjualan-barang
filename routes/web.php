<?php

use App\Http\Controllers\Penjualan\BarangController;
use App\Http\Controllers\Penjualan\BarangTerjualController;
use App\Http\Controllers\Penjualan\JenisBarangController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// super admin
Route::middleware(['auth', 'user-access:penjual'])->group(function () {
    //  kelola jenis barang
    Route::get('penjual/jenis-barang', [JenisBarangController::class, 'index'])->name('Penjual.jenis-barang.index');
    Route::post('penjual/jenis-barang', [JenisBarangController::class, 'store'])->name('Penjual.jenis-barang.store');
    Route::put('penjual/jenis-barang/{id}', [JenisBarangController::class, 'update'])->name('Penjual.jenis-barang.update');
    Route::delete('penjual/jenis-barang/{id}', [JenisBarangController::class, 'destroy'])->name('Penjual.jenis-barang.destroy');
    //  kelola Barang
    Route::get('penjual/barang', [BarangController::class, 'index'])->name('Penjual.barang.index');
    Route::post('penjual/barang', [BarangController::class, 'store'])->name('Penjual.barang.store');
    Route::put('penjual/barang/{id}', [BarangController::class, 'update'])->name('Penjual.barang.update');
    Route::put('penjual/barang/tambah-stok/{id}', [BarangController::class, 'tambahStokBarang'])->name('Penjual.barang.tambahStok');
    Route::delete('penjual/barang/{id}', [BarangController::class, 'destroy'])->name('Penjual.barang.destroy');
    //  kelola barang terjual
    Route::get('penjual/barang-terjual', [BarangTerjualController::class, 'index'])->name('Penjual.barang-terjual.index');
    Route::post('penjual/barang-terjual', [BarangTerjualController::class, 'store'])->name('Penjual.barang-terjual.store');
    Route::put('penjual/barang-terjual/{id}', [BarangTerjualController::class, 'update'])->name('Penjual.barang-terjual.update');
    Route::delete('penjual/barang-terjual/{id}', [BarangTerjualController::class, 'destroy'])->name('Penjual.barang-terjual.destroy');

});
