<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AbsenDosen;
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
                    'tanggal' => $request->input('tanggal'),
                    'account' => $user['account'],
                    'loginAs' => $user['loginSebagai'],
                ]
            );
            return redirect('/Home');
        }
        else return redirect('/');
    }


    function getUser($id){
        $account = MahasiswaAccounts::where('id_user','=',$id)->first();
        if($account != null){
            return ([
                'account' => $account,
                'loginSebagai' => 'mahasiswa',
            ]);
        }

        $account = DosenAccounts::where('id_userdosen','=',$id)->first();
        if($account != null){
            return ([
                'account' => $account,
                'loginSebagai' => 'dosen',
            ]);
        }

        return['loginSebagai' => null];
    }


    public function processView(Request $request){
        //this will handle if the user enter the /Home url
        //fetch time should be here
        // $this->getHomeSchedule(
        //     [
        //     "jadwal" => $this->getSchedule($request->session()->get('hari'),$request->session()->get('account')),
        //     "waktu" => TimeControl::getTime(),
        //     ]
        // );

        $this->getSchedule();

        if($request->session()->get('loginAs') == 'mahasiswa'){
            return view('Mahasiswa-Home');
        }else
        if($request->session()->get('loginAs') == 'dosen'){
            return view('Dosen-Home');
        }
    }


    // protected function getHomeSchedule($dataJadwal){
    //     $homeSchedule = collect();
    //     $waktu = strtotime($dataJadwal['waktu']);
    //     if($dataJadwal['jadwal'] != null)
    //     foreach($dataJadwal['jadwal'] as $item){
    //         $waktuSelesai = strtotime($item->jam_selesai);
    //         if($waktu < $waktuSelesai){
    //             $homeSchedule->push($item);
    //             if($homeSchedule->count() >= 2) break;
    //         }
    //     }
    //     session()->put(['homeSchedule' => $homeSchedule]);
    // }


    protected function getSchedule(){
        $account = session()->get('account');
        $loginAs = session()->get('loginAs');
        $hari = session()->get('hari');
        $waktu = session()->get('waktu');
        $tanggal = session()->get('tanggal');
        if($loginAs == 'mahasiswa'){
            $data = Schedule::where('hari','=',$hari)
            ->where('kelas','=',$account->kelas)
            ->where('jam_selesai','>',$waktu)
            ->orderBy('jam_mulai','asc')->get();
        }else
        if($loginAs == 'dosen'){
            $data = collect();
            $jadwal = Schedule::where('id_userdosen','=',$account->id_userdosen)
            ->where('hari','=',$hari)
            ->orderBy('jam_mulai','asc')->get();
            foreach($jadwal as $row){
                $absenDosen = AbsenDosen::where('id_jadwal','=',$row->id_jadwal)->where('tanggal','=',$tanggal)->first();
                if($absenDosen == null) $data->push($row);
                else if($absenDosen->waktu_selesai == null) $data->push($row);
            }
        }
        session()->put([
            'schedule' => $data,
        ]);
    }
}
