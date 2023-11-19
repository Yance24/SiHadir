<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DosenAccounts;
use App\Models\MahasiswaAccounts;
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
            $data = DosenAccounts::all();
        else if($user == 'Mahasiswa')
            $data = MahasiswaAccounts::all();
        else return redirect()->back();
        

    }
}
