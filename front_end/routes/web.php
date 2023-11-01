    <?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginValidation;
use App\Models\MahasiswaAccounts;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

    //Route untuk umum
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/test', function () {
        dd(MahasiswaAccounts::all());
    });

    Route::get('/change-password', function(){
        return view('change-password');
    });

    Route::get('/login', function(){
        return view('login');
    });

    //route untuk validasi login - Backend
    Route::post('/login-validation',[LoginValidation::class,'validateLogin'])->name('login-validation');

    // MAHASISWA

    Route::get('/mahasiswa/dashboard',[DashboardController::class,'processMahasiswaView']);

    Route::get('/mahasiswa/profil', function(){
        return view('mahasiswa.profil');
    });
    Route::get('/mahasiswa/perizinan', function(){
        return view('mahasiswa.perizinan');
    });

    Route::get('/mahasiswa/profil', function(){
        return view('mahasiswa.profil');
    });

    Route::get('/mahasiswa/pemindai', function(){
        return view('mahasiswa.pemindai');
    })->name('mahasiswa.barcode.index');

    // END

    // Route login untuk mahasiswa sama dengan login untuk dosen
    // Route::get('/mahasiswa/login', function(){
    //     return view('mahasiswa.login');
    // });
    
    //Route untuk dosen

    Route::get('/dosen/dashboard',[DashboardController::class,'processDosenView']);

    Route::get('/dosen/perizinan', function(){
        return view('dosen.perizinan');
    });

    //Route untuk admin
    Route::get('/admin/jadwal-akademik','App\Http\Controllers\SiHadirController@index');
