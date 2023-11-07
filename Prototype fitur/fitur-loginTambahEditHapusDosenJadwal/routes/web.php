<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LoginController;
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
    return view('index');
});

Route::get('/jadwal', [JadwalController::class, 'index']);

Route::put('/jadwal/{id_jadwal}', [JadwalController::class, 'update'])->name('jadwal.update');

Route::get('/jadwal/{id_jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');

Route::delete('/jadwal/{id_jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');

Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');


Route::get('/dosen', [DosenController::class, 'index']);

Route::put('/dosen/{id_userdosen}', [DosenController::class, 'update'])->name('dosen.update');

Route::get('/dosen/{id_userdosen}/edit', [DosenController::class, 'edit'])->name('dosen.edit');

Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');

Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');

Route::delete('/dosen/{id_userdosen}', [DosenController::class, 'destroy'])->name('dosen.destroy');

Route::get('/dosen/login', [DosenController::class, 'showLoginForm'])->name('admin.login');

Route::post('/dosen/login', [DosenController::class, 'login']);

Route::get('/auth', function() {
    return view('auth');

});

Route::get('/auth', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/auth', [LoginController::class,'login']);
Route::get('/', function () {
    if(session()->get('account') == null) return redirect()->back();
    return view('/index');
});
