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

//rute penerbangan index
Route::get('penerbangan',
    [App\Http\Controllers\PenerbanganController::class, 'index'])->name('penerbangan.index');

//rute penerbangan create
Route::get('penerbangan/create',
    [App\Http\Controllers\PenerbanganController::class, 'create'])->name('penerbangan.create');

//rute penerbangan store
Route::post('penerbangan',
    [App\Http\Controllers\PenerbanganController::class, 'store'])->name('penerbangan.store');
