<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginValidation;
use App\Http\Controllers\PerizinanController;
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

Route::get('/',[LoginValidation::class,'validateLogin']);

Route::get('/perizinan-mahasiswa',[PerizinanController::class,'processMahasiswaView']);

Route::get('/perizinan-dosen',[PerizinanController::class,'processDosenView']);

Route::post('/pengirimanFile',[FileController::class,'kirimPerizinan'])->name('post-perizinan');

Route::post('/preview-izin',[PerizinanController::class,'processPreviewFile'])->name('preview-izin');

Route::post('/validasi-perizinan',[PerizinanController::class,'validasiPerizinan'])->name('validate-surat-izin');
