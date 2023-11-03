<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GantiPasswordController extends Controller
{
    public function processView(){
        return view('gantiPassword');
    }

    public function validateChangePassword(Request $request){
        $oldPass = $request->input('oldPass');
        $newPass = $request->input('newPass');
        $repNewPass = $request->input('repNewPass');
        $account = session()->get('account');
        $loginSebagai = session()->get('loginSebagai');

        if($oldPass == $account->password){
            if($newPass == $repNewPass){
                if($loginSebagai == 'mahasiswa'){
                    DB::table('mahasiswa')->where('id_user','=',$account->id_user)->update([
                        'password' => $newPass,
                    ]);
                    dd('password berhasil diganti!');
                }else if($loginSebagai == 'dosen'){
                    DB::table('dosen')->where('id_userdosen','=',$account->id_userdosen)->update([
                        'password' => $newPass,
                    ]);
                    dd('password berhasil diganti!');
                }
            }
        }
        return redirect()->back();
    }
}
