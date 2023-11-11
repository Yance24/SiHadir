<?php

namespace App\Http\Controllers;

use App\Models\DosenAccounts;
use App\Models\MahasiswaAccounts;
use Illuminate\Http\Request;
use App\Models\Admin;

class LoginValidation extends Controller
{
    public function validateLogin(Request $request){
        $account = MahasiswaAccounts::where('id_user','=',$request->input('username'))->first();
        if($account != null){
            if($account->password == $request->input('password')){
                session()->put([
                    'account' => $account,
                    'loginAs' => 'Mahasiswa',
                ]);
                return redirect("/mahasiswa/dashboard");
            }
        }

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

    public function validateAdmin(Request $request){
        $id_admin = $request->input('id');
        $password = $request->input('pass');

        $admin = Admin::where('id_admin', $id_admin)->first();

        if ($admin && $admin->password === $password) {
            // Login berhasil
            session()->put([
                'account' => $admin,
                'loginAs' => 'Admin',
            ]);
            return redirect('/admin/dashboard'); // Ganti dengan halaman yang sesuai
        }

        return redirect('/admin/login');
    }

    public static function validateUser($loginAs){
        $user = session()->get("loginAs");
        if($user != null && $user == $loginAs) return true;
        else return false;
    }

    public function logout(){
        session()->forget("account");
        session()->forget("loginAs");
        // dd(session()->get("account"),session()->get("loginAs"));
        return redirect('/login');
    }
}
