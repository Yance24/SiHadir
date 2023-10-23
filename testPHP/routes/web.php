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

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/mainpage', function(){
        return view('mainpage');
    });

    Route::get('/dosen/change-password', function(){
        return view('dosen.change-password');
    });

    Route::get('/dosen/login', function(){
        return view('dosen.login');
    });

    Route::get('/mahasiswa/login', function(){
        return view('mahasiswa.login');
    });

    Route::get('/dosen/permits', function(){
        return view('dosen.permits');
    });

    //Route untuk CRUD
    Route::get('/sihadir','App\Http\Controllers\SiHadirController@index');
