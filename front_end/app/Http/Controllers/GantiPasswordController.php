<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaAccounts;
use App\Models\DosenAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GantiPasswordController extends Controller
{
    public function processView(){
        if(LoginValidation::validateUser('Mahasiswa') || LoginValidation::validateUser('Dosen')) return view('ganti-password');

        return redirect('/login');
    }

    public function validateChangePassword(Request $request){
        $oldPass = $request->input('oldPass');
        $newPass = $request->input('newPass');
        $repNewPass = $request->input('repPass');
        $account = session()->get('account');
        $loginSebagai = session()->get('loginAs');

        if($oldPass == $account->password){
            if($newPass == $repNewPass){
                if($loginSebagai == 'Mahasiswa'){
                    DB::table('mahasiswa')->where('id_user','=',$account->id_user)->update([
                        'password' => $newPass,
                    ]);
                    $account = MahasiswaAccounts::where('id_user','=',$account->id_user)->first();
                    session()->put([
                        'account' => $account,
                    ]);
                    return redirect('/mahasiswa/profil');
                }else if($loginSebagai == 'Dosen'){
                    DB::table('dosen')->where('id_userdosen','=',$account->id_userdosen)->update([
                        'password' => $newPass,
                    ]);
                    $account = DosenAccounts::where('id_userdosen','=',$account->id_userdosen)->first();
                    session()->put([
                        'account' => $account,
                    ]);
                    return redirect('/dosen/profile');
                }
            }
        }
        return redirect()->back();
    }
}
