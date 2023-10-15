<?php

namespace App\Http\Controllers;

use App\Models\DosenAccounts;
use App\Models\MahasiswaAccounts;
use Illuminate\Http\Request;

class LoginValidation extends Controller
{
    public function validateUser(Request $request){
        $account = MahasiswaAccounts::where('id_user','=',$request->input('id'))->first();
        if($account != null){
            if($account->password == $request->input('pass'))
                return redirect("/Home")->with(['account' => $account, 'as' => 'mahasiswa']);
        }

        $account = DosenAccounts::where('id_userdosen','=',$request->input('id'))->first();
        if($account != null){
            if($account->Password == $request->input('pass'))
                return redirect("/Home")->with(['account' => $account, 'as' => 'dosen']);
        }

        return view(
            'login',
        );
    }

    public function processView(Request $request){
        if($request->session()->get('as') == 'mahasiswa')
            return view(
                'Mahasiswa-Home',
            );
        
        if($request->session()->get('as') == 'dosen')
            return view(
                'Dosen-Home',
            );
        
    }
}
