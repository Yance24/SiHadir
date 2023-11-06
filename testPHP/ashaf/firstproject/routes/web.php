<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Models\admin;

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
    return view('loginadmin');
});

Route::post('/register', [UserController::class, 'register']);
Route::get('/showdatamahasiswa', [UserController::class, 'showdata']);

Route::post('/dashboardadmin', [adminController::class, 'regisadmin']);
Route::get('/dashboardadmin', [adminController::class, 'regisadmin']);
Route::get('/datamahasiswa', [adminController::class, 'datamahasiswa']);

Route::get('/datadosen', [adminController::class, 'datadosen']);

Route::post('/logout', [adminController::class, 'logout']);
// Route::post('/dashboardadmin', [adminController::class, 'todashboardadmin']);
Route::post('/regisadmin', [adminController::class, 'regisadmin']);
Route::get('/dashboardadmin', [adminController::class, 'regisadmin']);
Route::post('/logout', [adminController::class, 'logout']);
Route::get('/loginadmin', [adminController::class, 'logout']);
