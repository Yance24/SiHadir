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

    Route::get('/testing', function () {
        $jadwal = session()->get('schedule');
        $jadwal->shift();
        foreach ($jadwal as $item) {
            echo $item->mataKuliah->nama_makul . '<br>';
        }
        // echo $jadwal[0]->mataKuliah->nama_makul . '<br>';
        // echo $jadwal[1]->mataKuliah->nama_makul;
    });

    Route::get('/change-password', function () {
        return view('change-password');
    });

    Route::get('/login', function () {
        // session()->flush();
        return view('login');
    });

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

    Route::view('/profil', 'NavigasiController@dashboard')->name('dashboard::class.dashboard');


    // END

    Route::post('/login-validation', [LoginValidation::class, 'validateLogin'])->name('login-validation');

    // Route login untuk mahasiswa sama dengan login untuk dosen
    // Route::get('/mahasiswa/login', function(){
    //     return view('mahasiswa.login');
    // });

    //Route dashboard generate testing
    Route::post('dosen/qr_dosen', function () {
        echo 'tes';
    });

    //Route untuk dosen
    Route::get('/dosen/perizinan', function () {
        return view('dosen.perizinan');
    });
    Route::get('/dosen/dashboard', [DashboardController::class, 'processDosenView']);

    //Route untuk admin
    Route::get('/admin/jadwal-akademik', 'App\Http\Controllers\SiHadirController@index');
