    <?php


    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\PemindaiController;
    use App\Http\Controllers\LoginValidation;
    use App\Http\Controllers\AbsensiController;
    use App\Http\Controllers\ScheduleController;
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Carbon;
    use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


    //Route untuk umum
    Route::get('/', function () {
        if(session()->has('loginAs') && session()->get('loginAs') == 'Mahasiswa')
            return redirect('/mahasiswa/dashboard');
        else if(session()->has('loginAs') && session()->get('loginAs') == 'Dosen')
            return redirect('/dosen/dashboard');
        else return redirect('/login');
        
    });

    Route::get('/testing', function () {
        dd(Carbon::now());
    });

    Route::get('/change-password', function () {
        return view('change-password');
    });

    Route::get('/login', function () {
        return view('login');
    });

    //route untuk validasi login - Backend
    Route::post('/login-validation',[LoginValidation::class,'validateLogin'])->name('login-validation');

    Route::get('/logout',[LoginValidation::class,'logout'])->name('logout');

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

    Route::post('scanner', [PemindaiController::class, 'scanner']);

    Route::get('/mahasiswa/test', function(){
        return view('mahasiswa.test');
    });

    Route::get('/mahasiswa/testCamera', function(){
        return view('mahasiswa.testCamera');
    });

    Route::get('/mahasiswa/pemindai', function(){
        return view('mahasiswa.pemindai');
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

    // Route::get('/Test-QR',function(){
    //     echo("<img src='https://chart.googleapis.com/chart?cht=qr&chl=".session()->get('idQr')."&chs=160x160&chld=L|0'/>");
    // });

    //Route untuk dosen
    
    //url for dashboard dosen
    Route::get('/dosen/dashboard', [DashboardController::class, 'processDosenView']);
    
    //Redirect for generating qr
    Route::post('dosen/qr_dosen', [AbsensiController::class,'generateQR']);

    //url for displaying generated qr
    Route::get('/dosen/dashboard/displayQr',[DashboardController::class,'processQrView']);
    
    Route::get('/dosen/perizinan', function () {
        return view('dosen.perizinan');
    });

    //Route untuk admin

    //url login admin
    Route::get('/admin/login',function(){
        return view('admin.login-admin');
    });

    //url redirect validate admin login
    Route::post('/admin/login-validation',[LoginValidation::class,'validateAdmin'])->name('login-admin');

    Route::get('/admin/dashboard',[DashboardController::class,'processAdminView']);



    Route::get('/admin/jadwal-akademik', 'App\Http\Controllers\SiHadirController@index');
