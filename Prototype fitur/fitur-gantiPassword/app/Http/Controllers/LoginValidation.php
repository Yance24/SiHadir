<?php

namespace App\Http\Controllers;

use App\Models\DosenAccount;
use App\Models\MahasiswaAccount;
use Illuminate\Http\Request;

class LoginValidation extends Controller
{
    public function validateLogin(Request $request){
        $id = $request->input("id");
        $pass = $request->input("pass");

        $account = MahasiswaAccount::where('id_user','=',$id)->first();
        if($account != null){
            if($pass == $account->password){
                session()->put([
                    'account' => $account,
                    'loginSebagai' => 'mahasiswa',
                ]);
                return redirect('/ganti-password');
            }
        }

        $account = DosenAccount::where('id_userdosen','=',$id)->first();
        if($account != null){
            if($pass == $account->password){
                session()->put([
                    'account' => $account,
                    'loginSebagai' => 'dosen',
                ]);
                return redirect('/ganti-password');
            }
        }
        return redirect()->back();
    }
}
