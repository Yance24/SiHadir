<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\MahasiswaAccounts;
use App\Models\DosenAccounts;

class LoginValidation extends Controller
{

    public function validateUser(Request $request){
        $user = $this->getUser($request->input('id'));
        if($user['loginSebagai'] == 'mahasiswa' || $user['loginSebagai'] == 'dosen'){
            session()->put(
                [
                    'hari' => $request->input('hari'),
                    'waktu' => $request->input('waktu'),
                    'account' => $user,
                ]
            );
            return redirect('/Home');
        }
        else return redirect('/');
    }


    function getUser($id){
        $account = MahasiswaAccounts::where('id_user','=',$id)->first();
        if($account != null){
            return ['loginSebagai' => 'mahasiswa','account' => $account];
        }

        $account = DosenAccounts::where('id_userdosen','=',$id)->first();
        if($account != null){
            return ['loginSebagai' => 'dosen','account' => $account];
        }

        return['loginSebagai' => null];
    }


    public function processView(Request $request){
        //this will handle if the user enter the /Home url
        //fetch time should be here
        $this->getHomeSchedule(
            [
            "jadwal" => $this->getSchedule($request->session()->get('hari'),$request->session()->get('account')),
            "waktu" => TimeControl::getTime(),
            ]
        );

        if($request->session()->get('account')['loginSebagai'] == 'mahasiswa'){
            return view('Mahasiswa-Home');
        }else
        if($request->session()->get('account')['loginSebagai'] == 'dosen'){
            return view('Dosen-Home');
        }
    }


    protected function getHomeSchedule($dataJadwal){
        $homeSchedule = collect();
        $waktu = strtotime($dataJadwal['waktu']);
        if($dataJadwal['jadwal'] != null)
        foreach($dataJadwal['jadwal'] as $item){
            $waktuSelesai = strtotime($item->jam_selesai);
            if($waktu < $waktuSelesai){
                $homeSchedule->push($item);
                if($homeSchedule->count() >= 2) break;
            }
        }
        session()->put(['homeSchedule' => $homeSchedule]);
    }


    protected function getSchedule($hari,$account){
        if($account['loginSebagai'] == 'mahasiswa'){
            $data = Schedule::where('hari','=',$hari)->where('kelas','=',$account['account']->kelas)->orderBy('jam_mulai','asc')->get();
            return $data;
        }else
        if($account['loginSebagai'] == 'dosen'){
            $data = Schedule::where('id_userdosen','=',$account['account']->id_userdosen)->where('hari','=',$hari)->orderBy('jam_mulai','asc')->get();
            return $data;
        }
    }
}
