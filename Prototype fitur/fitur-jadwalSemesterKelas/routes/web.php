<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalController;
use App\Models\Semester;
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
    return view('/jadwal/semester', [
        'semesters'=> Semester::all(),
    ]);
});

Route::put('/jadwal/{id_jadwal}', [JadwalController::class, 'update'])->name('jadwal.update');

Route::get('/jadwal/{id_jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');

Route::delete('/jadwal/{id_jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');

Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');

Route::get('/semester/{{ $semester->id_semester }}', [AdminController::class,'ambilDataSemester'])->name('jadwal.semester');
    
Route::get('/jadwal/kelas/{kelas}', [AdminController::class,'ambilDataSemester'])->name('jadwal.kelas');

Route::get('/jadwal2', [AdminController::class, 'showByClass'])->name('jadwal2');