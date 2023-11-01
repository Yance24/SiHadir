<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Carbon;

class ScheduleController extends Controller
{
    public static function getDashboardSchedule($waktu = 'default'){
        $dataJadwal = session()->get('schedule');
        $homeSchedule = collect();
        ($waktu == 'default')? $waktu = strtotime(TimeControl::getTime()): $waktu = strtotime($waktu);
        if($dataJadwal != null)
        foreach($dataJadwal as $item){
            $waktuSelesai = strtotime($item->jam_selesai);
            if($waktu < $waktuSelesai){
                $homeSchedule->push($item);
                if($homeSchedule->count() >= 2) break;
            }
        }
        session()->put(['dashboardSchedule' => $homeSchedule]);
    }


    public static function getSchedule($hari = 'default'){
        $loginAs = session()->get('loginAs');
        $account = session()->get('account');
        ($hari == 'default') ? $hari = TimeControl::getDays(): $hari;

        if($loginAs == 'Mahasiswa')
            $data = Schedule::where('hari','=',$hari)->where('kelas','=',$account->kelas)->orderBy('jam_mulai','asc')->get();
        else if($loginAs == 'Dosen')
            $data = Schedule::where('id_userdosen','=',$account->id_userdosen)->where('hari','=',$hari)->orderBy('jam_mulai','asc')->get();
        session()->put(['schedule' => $data]);
    }
}