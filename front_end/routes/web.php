    <?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginValidation;
use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

    //Route untuk umum
    Route::get('/', function(){
        return view('login');
    });

    Route::post('/login-validation',[LoginValidation::class,'validateLogin'])->name('login-validation');
    Route::get('/ganti-password', function(){
        return view('ganti-password');
    });
    
    //Route untuk dosen
    Route::get('/dosen/perizinan', function(){
        return view('dosen.perizinan');
    });
    Route::get('/dosen/dashboard',[DashboardController::class,'processDosenView']);

    // MAHASISWA

    Route::get('/mahasiswa/profil', function(){
        return view('mahasiswa.profil');
    });
    Route::get('/mahasiswa/perizinan', function(){
        return view('mahasiswa.perizinan');
    });

    Route::get('/mahasiswa/dashboard', function(){
        return view('mahasiswa.dashboard');
    });

    Route::get('/mahasiswa/profil', function(){
        return view('mahasiswa.profil');
    });

    Route::post('scanner', [PemindaiController::class, 'scanner']);

    Route::get('/mahasiswa/test', function(){
        return view('mahasiswa.test');
    });

    Route::get('/pemindai', 'PemindaiController@scanner')->name('pemindai::class.scanner');

    Route::view('/profil', 'NavigasiController@profil')->name('profil::class.profil');

    // END

    //Route untuk admin
    Route::get('/admin/jadwal-akademik','App\Http\Controllers\SiHadirController@index');

    Route::get('/test-kamera', function(){
        return view ('test-kamera');
    });
