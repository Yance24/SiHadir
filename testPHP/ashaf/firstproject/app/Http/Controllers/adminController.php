<?php


namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
use App\Models\dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function Ramsey\Uuid\v1;

class adminController extends Controller
{
    public function regisadmin(Request $request)
    {
        $validate = $request->all();
        $id_admin = $request->input('id_admin');
        $password = $request->input('password');
        $admins = admin::all();
        $veriv = admin::where('id_admin', $id_admin)->count();
        $input = $request->all();

        // $user = DB::table('user')->where('id_admin', $id_admin)('password', $password)->first();
        // $account = admin::where('id_admin', '=', $id_admin)->where('password', $password)->first();
        // if ($account == '') {
        //     return view('dashboardadmin');
        // } else return "gagal";


        if ($veriv == 1) {
        }
        return view('dashboardadmin');
    }
    public function logout()
    {
        return view('loginadmin');
    }
    public function datamahasiswa()
    {
        $datamahasiswa = DataMahasiswa::all();
        return view('home', ['mahasiswa' => $datamahasiswa, 'dosen' => []]);
    }
    public function datadosen()
    {
        $datadosen = dosen::all();
        return view('home', ['dosen' => $datadosen, 'mahasiswa' => []]);
    }
    // public function todashboardadmin()
    // {
    //     return redirect('dashboardadmin');
    // }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'id_admin' => ['required'],
            'password' => ['required'],
        ]);
        $dataisian = admin::all();
        if (admin::attempt($credentials)) {
            $request->session()->regenerate();

            return view('dashboaradmin');
        }
        return redirect('loginadmin');
    }
}
