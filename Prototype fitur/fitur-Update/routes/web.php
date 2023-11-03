<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;


Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);

Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);

Route::patch('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');

Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
