<?php

use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\LoginValidation;
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
    return view('login');
});

Route::post('/login-validation',[LoginValidation::class,'validateLogin'])->name('validate-login');

Route::get('/ganti-password',[GantiPasswordController::class,'processView']);

Route::post('/ganti-password-validation',[GantiPasswordController::class,'validateChangePassword'])->name('validate-change-password');


