<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//login sebelum akses 
Route::middleware('auth')->group(function () {
   //rute penerbangan index
Route::get('penerbangan',
[App\Http\Controllers\PenerbanganController::class, 'index'])->name('penerbangan.index');
//rute penerbangan create
Route::get('penerbangan/create',
[App\Http\Controllers\PenerbanganController::class, 'create'])->name('penerbangan.create');
//rute penerbangan store
Route::post('penerbangan',
[App\Http\Controllers\PenerbanganController::class, 'store'])->name('penerbangan.store');
//rute penerbangan edit 
Route::get('penerbangan/{id}/edit',
[App\Http\Controllers\PenerbanganController::class, 'edit'])->name('penerbangan.edit');
//rute penerbangan update
Route::put('penerbangan/{id}',
[App\Http\Controllers\PenerbanganController::class, 'update'])->name('penerbangan.update');
//rute penerbangan delete
Route::get('penerbangan/{id}',
[App\Http\Controllers\PenerbanganController::class, 'destroy'])->name('penerbangan.destroy');

// route transaksi index
Route::get('transaksi',
    [App\Http\Controllers\TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('transaksi/create',
    [App\Http\Controllers\TransaksiController::class, 'create'])->name('transaksi.create');
Route::post('transaksi/store',[App\Http\Controllers\TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('transaksi/destroy/{id}',[App\Http\Controllers\TransaksiController::class, 'destroy'])->name('transaksi.destroy');
Route::get('checkout',
    [App\Http\Controllers\TransaksiController::class, 'checkout'])->name('transaksi.checkout');

//checkout 
Route::post('checkoutstore',
    [App\Http\Controllers\TransaksiController::class, 'checkout_store'])->name('transaksi.checkout_store');
});
