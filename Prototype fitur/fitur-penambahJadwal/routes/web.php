<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;

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
});

Route::get('/jadwal', [JadwalController::class, 'index']);
// Menampilkan formulir untuk membuat jadwal baru
Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal_create');
Route::post('/jadwal', 'JadwalController@store');


// Menangani pengiriman formulir dan membuat jadwal baru
Route::post('/jadwal', [JadwalController::class, 'store']);


// Route untuk menampilkan form
Route::get('/jadwal/create', [JadwalController::class, 'create']);

// Route untuk menyimpan data jadwal
Route::post('/jadwal', [JadwalController::class, 'store']);
