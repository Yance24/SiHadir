<?php

namespace App\Http\Controllers;

use App\Models\DosenAccounts;
use App\Models\MahasiswaAccounts;
use Illuminate\Http\Request;

class LoginValidation extends Controller
{
    public function validateLogin(Request $request){
        // $account = MahasiswaAccounts::where('id_user','=',$request->input('id'))->first();
        // if($account != null){
        //     if($account->password == $request->input('pass'))
        //         return redirect("/")->with(['account' => $account, 'as' => 'mahasiswa']);
        // }
        $account = DosenAccounts::where('id_userdosen','=',$request->input('username'))->first();
        if($account != null){
            if($account->password == $request->input('password')){
                session()->put([
                    'account' => $account,
                    'loginAs' => 'Dosen',
                ]);
                return redirect("/dosen/dashboard");
            }
        }
        return redirect("/login");
    }

    public static function validateUser($loginAs){
        $user = session()->get("loginAs");
        if($user != null && $user == $loginAs) return true;
        else return false;
    }
}
