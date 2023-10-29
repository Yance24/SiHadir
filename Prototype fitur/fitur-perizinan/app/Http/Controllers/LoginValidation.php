<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaAccount;
use App\Models\DosenAccount;
use App\Models\Schedule;
use Illuminate\Http\Request;

class LoginValidation extends Controller
{
    public function validateLogin(){
        $id = '3202116006';
        // $id = '197302061995011001';
        $waktu = '07:00:00';
        $hari = 'senin';
        $tanggal = '2023-10-28';

        $account = MahasiswaAccount::where('id_user','=',$id)->first();
        if($account != null){
            $data = Schedule::where('hari','=',$hari)->where('kelas','=',$account->kelas)->orderBy('jam_mulai','asc')->get();
            session()->put([
                'jadwal' => $data,
                'waktu' => $waktu,
                'account' => $account,
                'hari' => $hari,
                'tanggal' => $tanggal,
            ]);
            return redirect('perizinan-mahasiswa');
        }

        $account = DosenAccount::where('id_userdosen','=',$id)->first();
        if($account != null){
            $data = Schedule::where('id_userdosen','=',$account->id_userdosen)->where('hari','=',$hari)->orderBy('jam_mulai','asc')->get();
            session()->put([
                'jadwal' => $data,
                'waktu' => $waktu,
                'account' => $account,
                'hari' => $hari,
                'tanggal' => $tanggal,
            ]);
            return redirect('perizinan-dosen');
        }
        dd('invalid login');
    }
}