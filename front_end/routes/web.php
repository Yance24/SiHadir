    <?php
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\PemindaiController;
    use App\Http\Controllers\LoginValidation;
    use App\Http\Controllers\AbsensiController;
    use App\Http\Controllers\GantiPasswordController;
    use App\Http\Controllers\PerizinanController;
    use App\Http\Controllers\ScheduleController;
    use App\Http\Controllers\BarcodeController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\DosenController;
use App\Http\Controllers\RekapDataController;
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
    Route::get('/login', function(){
        return view('login');
    })->name('login');
    
    Route::post('/login-validation', [LoginValidation::class, 'validateLogin'])->name('login-validation');

    Route::get('/testing', function () {
        return view('mahasiswa.jenisPerizinan');
    });

    //url untuk nampilin page ganti password buat mahasiswa dan dosen
    Route::get('/change-password',[GantiPasswordController::class,'processView']);

    //redirect buat validasi ganti passwordnya
    Route::post('/validate-changePassword',[GantiPasswordController::class,'validateChangePassword'])->name('validate-changePassword');

    // Route::get('',)

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

    Route::get('/mahasiswa/hasilScan', function(){
        return view('mahasiswa.hasilScan');
    })->name('hasilScan');

    // url untuk pemindai
    Route::post('/mahasiswa/pemindai', [AbsensiController::class,'processScanQrView'])->name('pemindai');

    // Send ajax request to validate qr id
    Route::get('/mahasiswa/validate-scan',[AbsensiController::class,'scanQr']);

    // Post hasil scan Barcode
    Route::post('mahasiswa/hasilScan', [BarcodeController::class, 'storeScannedData']);

    // url untuk perizinan
    Route::get('/mahasiswa/perizinan',[PerizinanController::class,'processMahasiswaView']);

    // redirect url untuk ngirim file perizinan
    Route::post('/mahasiswa/perizinan/send-file',[PerizinanController::class,'sendFile'])->name('sendPerizinan-file');

    Route::get('/mahasiswa/profil', function(){
        if(!LoginValidation::validateUser('Mahasiswa')) return redirect()->back();
        return view('mahasiswa.profil');
    })->name('profil');


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


    //Redirect for close class
    Route::post('dosen/close-class',[AbsensiController::class,'closeClass'])->name('close-class');


    //url for displaying generated qr
    Route::get('/dosen/dashboard/displayQr',[DashboardController::class,'processQrView']);
    

    //url for perizinan dosen
    Route::get('/dosen/perizinan',[PerizinanController::class,'processDosenView']);


    //url untuk fetch pdf request
    Route::get('/dosen/perizinan/{idUser}',[PerizinanController::class,'requestPdf']);

    Route::post('/dosen/perizinan/validateIzin',[PerizinanController::class,'validateIzin']);

    Route::post('/dosen/perizinan/invalidateIzin',[PerizinanController::class,'invalidateIzin']);

    

    //Route untuk admin

    //url login admin
    Route::get('/admin/login',function(){
        return view('admin.login-admin');
    });

    //url redirect validate admin login
    Route::post('/admin/login-validation',[LoginValidation::class,'validateAdmin'])->name('login-admin');

    //url dashboard admin
    Route::get('/admin/dashboard',[DashboardController::class,'processAdminView']);

    //url pemilihan jadwal pada semester dan kelas mana
    Route::get('/admin/schedule',[ScheduleController::class,'processView']);

    Route::post('/admin/schedule/addSemester',[ScheduleController::class,'addSemester']);

    Route::post('/admin/schedule/removeSemester',[ScheduleController::class,'removeSemester']);

    Route::post('/admin/schedule/addKelas',[ScheduleController::class,'addKelas']);

    Route::post('/admin/schedule/removeKelas',[ScheduleController::class,'removeKelas']);

    //url tampilan jadwal yang lebih detail
    Route::get('/admin/schedule/kelas',[ScheduleController::class,'processKelasView']);

    Route::post('/admin/schedule/kelas/addJadwal',[ScheduleController::class,'addJadwal']);

    Route::post('/admin/schedule/kelas/getSelectedJadwal',[ScheduleController::class,'getSelectedJadwal']);

    Route::post('/admin/schedule/kelas/updateJadwal',[ScheduleController::class,'updateJadwal']);

    Route::post('/admin/schedule/kelas/deleteJadwal',[ScheduleController::class,'deleteJadwal']);


    Route::get('/admin/rekapData',[RekapDataController::class,'processView']);

    Route::get('/admin/rekapData/kelas',[RekapDataController::class,'processKelasView']);

    Route::post('/admin/rekapData/kelas/updateChanges',[RekapDataController::class,'updateChanges']);






    Route::get('/admin/user-data',[]);

    // Route::get('/admin/jadwal-akademik', 'App\Http\Controllers\SiHadirController@index');





    //url tampilan userdata admin
    Route::get('/admin/user-data/admin', [AdminController::class, 'index']);

    Route::put('/admin/user-data/admin/{id_admin}', [AdminController::class, 'update'])->name('admin.update');

    Route::get('/admin/user-data/admin/{id_admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');

    Route::get('/admin/user-data/admin/create', [AdminController::class, 'create'])->name('admin.create');

    Route::post('/admin/user-data/admin', [AdminController::class, 'store'])->name('admin.store');

    Route::delete('/admin/user-data/admin/{id_admin}', [AdminController::class, 'destroy'])->name('admin.destroy');

    //url tampilan userdata dosen
    Route::get('/admin/user-data/dosen', [DosenController::class, 'index']);

    Route::put('/admin/user-data/dosen/{id_userdosen}', [DosenController::class, 'update'])->name('dosen.update');

    Route::get('/admin/user-data/dosen/{id_userdosen}/edit', [DosenController::class, 'edit'])->name('dosen.edit');

    Route::get('/admin/user-data/dosen/create', [DosenController::class, 'create'])->name('dosen.create');

    Route::post('/admin/user-data/dosen', [DosenController::class, 'store'])->name('dosen.store');

    Route::delete('/admin/user-data/dosen/{id_userdosen}', [DosenController::class, 'destroy'])->name('dosen.destroy');

