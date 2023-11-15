<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekapdataController;

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
    return view('dashboardrekapdata');
});
Route::get('/dashboardrekap', [RekapdataController::class, 'showSemester'])->name('dashboardrekap');
Route::get('/rekapdata/Kelas/{class}', [RekapdataController::class, 'classDetail'])->name('rekapdata');
// Route::get('/exportpdf/{class}', [RekapdataController::class, 'exportpdf'])->name('export-pdf');
Route::get('/rekapdata/Kelas/{class}/pdf', [RekapdataController::class, 'downloadPDF'])->name('downloadPDF');
