<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DosenAccounts;
use App\Models\MahasiswaAccounts;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDataController extends Controller
{
    public function processView(Request $request){
        if(!LoginValidation::validateUser('Admin')) return redirect()->back();
        
        $user = $request->input('user');

        if($user == 'Admin'){
            $data = Admin::all();
            return view('admin.userData',[
                'userInfo' => $user,
                'data' => $data,
            ]);
        }
        else if($user == 'Dosen'){
            $data = DosenAccounts::all();
            
            return view('admin.userData',[
                'userInfo' => $user,
                'data' => $data,
            ]);
        }
        else if($user == 'Mahasiswa'){
            $data = MahasiswaAccounts::all();
            return view('admin.userData',[
                'userInfo' => $user,
                'data' => $data,
            ]);
        }
        else return redirect()->back();
    }

    public function addUser(Request $request){
        $userInfo = $request->input('userInfo');
        $id = $request->input('id');
        $nama = $request->input('nama');
        $jenisKelamin = $request->input('jenisKelamin');

        if($userInfo == 'Mahasiswa'){
            $semester = $request->input('semester');
            $kelas = $request->input('kelas');

            try{
                DB::table('mahasiswa')->insert([
                    'id_user' => $id,
                    'nama' => $nama,
                    'semester' => $semester,
                    'kelas' => $kelas,
                    'password' => $id,
                    'kelamin' => $jenisKelamin,
                ]);
            }catch(QueryException $e){
                return response()->json(['status' => 'failed']);
            }
        }else if($userInfo == 'Dosen')
            try{
                DB::table('dosen')->insert([
                    'id_userdosen' => $id,
                    'nama' => $nama,
                    'password' => $id,
                    'kelamin' => $jenisKelamin,
                ]);
            }catch(QueryException $e){
                return response()->json(['status' => 'failed']);
            }
        else if($userInfo == 'Admin')
            try{
                DB::table('admin')->insert([
                    'id_admin' => $id,
                    'nama' => $nama,
                    'password' => $id,
                    'kelamin' => $jenisKelamin,
                ]);
            }catch(QueryException $e){
                return response()->json(['status' => 'failed']);
            }
        
        return response()->json(['status'=> 'success']);
    }
}
