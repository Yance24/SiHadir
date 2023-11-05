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

    Route::get('/ganti-password', function(){
        return view('ganti-password');
    })->name('ganti-password');

    Route::get('/login', function(){
        return view('login');
    })->name('login');

    // MAHASISWA

    Route::get('dashboard', function () {
        return view('mahasiswa.dashboard');
    })->name('dashboard');

    Route::get('profil', function () {
        return view('mahasiswa.profil');
    })->name('profil');

    Route::get('perizinan', function () {
        return view('mahasiswa.perizinan');
    })->name('perizinan');

    Route::get('/mahasiswa/pemindai', function(){
        return view('mahasiswa.pemindai');
    })->name('pemindai');

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
