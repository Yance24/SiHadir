<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\LoginValidation;
use App\Models\MahasiswaAccounts;
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

Route::get('/test',function(){
    dd(MahasiswaAccounts::all());
});

Route::get('/', function () {
    return view('login');
});

Route::post('/login-validation',[LoginValidation::class,'validateUser'])->name('login-validation');

Route::get('/Home',[LoginValidation::class,'processView']);

Route::post('/sqanQR',[AbsensiController::class,'scanQr'])->name('sqanQR');

Route::post('/generateQr',[AbsensiController::class,'generateQr'])->name('generateQr');

Route::post('/tutupMakul',[AbsensiController::class,'closeClass'])->name('tutupMakul');