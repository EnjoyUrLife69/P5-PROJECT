<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

use App\Http\Controllers\TampilController;
Route::get('/tampil/{id}', [TampilController::class, 'tampil']);


use App\Http\Controllers\PenulisController;
Route::resource('penulis', PenulisController::class);

use App\Http\Controllers\KategoriController;
Route::resource('kategori', KategoriController::class);

use App\Http\Controllers\ArtikelController;
Route::get('artikel', [ArtikelController::class, 'index']);
Route::resource('artikel', ArtikelController::class);


