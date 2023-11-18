<?php

use App\Http\Controllers\AdminController;
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
});

Route::get('/admin', [AdminController::class, 'index']);

Route::put('/admin/{id_admin}', [AdminController::class, 'update'])->name('admin.update');

Route::get('/admin/{id_admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');

Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');

Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

Route::delete('/admin/{id_admin}', [AdminController::class, 'destroy'])->name('admin.destroy');
