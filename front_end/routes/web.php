    <?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginValidation;
use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

    //Route untuk umum
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/change-password', function(){
        return view('change-password');
    });

    Route::get('/login', function(){
        // session()->flush();
        return view('login');
    });

    Route::get('/mahasiswa/profil', function(){
        return view('mahasiswa.profil');
    });

    Route::get('/mahasiswa/dashboard', function(){
        return view('mahasiswa.dashboard');
    });

    Route::post('/login-validation',[LoginValidation::class,'validateLogin'])->name('login-validation');

    // Route login untuk mahasiswa sama dengan login untuk dosen
    // Route::get('/mahasiswa/login', function(){
    //     return view('mahasiswa.login');
    // });
    
    //Route untuk dosen
    Route::get('/dosen/perizinan', function(){
        return view('dosen.perizinan');
    });
    Route::get('/dosen/dashboard',[DashboardController::class,'processDosenView']);

    //Route untuk admin
    Route::get('/admin/jadwal-akademik','App\Http\Controllers\SiHadirController@index');
