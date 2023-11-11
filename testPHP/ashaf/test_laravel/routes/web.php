<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/test', function () {
    return view('testdatabase');
});

Route::get('/con', function () {
    return view('testdatabase');
});

Route::post('/regis', [UserController::class, 'showinput']);
Route::get('/regiss', [UserController::class, 'showinput']);

Route::get('/mahasiswa-data', [Controller::class, 'showdatabase']);

Route::get('/testdata', function () {
    return view('testtampil');
});
