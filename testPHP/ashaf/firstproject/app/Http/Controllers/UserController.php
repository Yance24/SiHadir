<?php

namespace App\Http\Controllers;

use App\Models\DataMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // $incomingField = $request->validate([
        //     'NIM' => 'required',
        //     'Nama' => 'required',
        //     'Kelas' => 'required'
        // ]);

        $NIM = $request->input('NIM');
        $Nama = $request->input('Nama');
        $Kelas = $request->input('Kelas');
        $gender = $request->input('gender');

        DB::table('mahasiswa')->insert([
            'id_user' => $NIM,
            'nama' => $Nama,
            'kelas' => $Kelas,
            'password' => $NIM,
            'kelamin' => $gender
        ]);
        return redirect('/dashboardadmin');
    }
    public function showdata()
    {
        $dataisian = DataMahasiswa::all();
        return view('home', ['mahasiswa' => $dataisian]);
    }
}
