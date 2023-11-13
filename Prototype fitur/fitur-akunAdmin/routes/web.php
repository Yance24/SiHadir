<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
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
Route::get('/auth/login', function() {
    return view('auth.login');

});

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');

Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');







