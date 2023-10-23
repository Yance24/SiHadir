    <?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\DB;

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

    //Route untuk umum
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/change-password', function(){
        return view('change-password');
    });

    Route::get('/login', function(){
        return view('login');
    });

    // Route login untuk mahasiswa sama dengan login untuk dosen
    // Route::get('/mahasiswa/login', function(){
    //     return view('mahasiswa.login');
    // });
    
    //Route untuk dosen
    Route::get('/dosen/perizinan', function(){
        return view('dosen.perizinan');
    });

    //Route untuk admin
    Route::get('/admin/jadwal-akademik','App\Http\Controllers\SiHadirController@index');
