<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DosenAccount;
use App\Models\MahasiswaAccount;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function processView(Request $request){
        if(!LoginValidation::validateUser('Admin')) return redirect()->back();
        
        $user = $request->input('user');

        if($user == 'Admin'){
            $data = Admin::all();
            return view('admin.userData',[
                'userInfo' => $user,
                'id' => $data->id_admin,
                'nama' => $data->nama,
                ''
            ]);
        }
        else if($user == 'Dosen')
            $data = DosenAccount::all();
        else if($user == 'Mahasiswa')
            $data = MahasiswaAccount::all();
        else return redirect()->back();
        

    }
}
