<?php

namespace App\Http\Controllers;

use App\Models\AbsenDosen;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Carbon;

class ScheduleController extends Controller
{
    // public static function getDashboardSchedule(){
    //     $dataJadwal = session()->get('schedule');
    //     $homeSchedule = collect();
    //     // ($waktu == 'default')? $waktu = strtotime(TimeControl::getTime()): $waktu = strtotime($waktu);
    //     $waktu = strtotime(TimeControl::getTime('07:00:00'));
    //     if($dataJadwal != null)
    //     foreach($dataJadwal as $item){
    //         $waktuSelesai = strtotime($item->jam_selesai);
    //         if($waktu < $waktuSelesai){
    //             $homeSchedule->push($item);
    //             if($homeSchedule->count() >= 2) break;
    //         }
    //     }
    //     session()->put(['dashboardSchedule' => $homeSchedule]);
    // }


    public static function getSchedule(){
        $loginAs = session()->get('loginAs');
        $account = session()->get('account');
        // ($hari == 'default') ? $hari = TimeControl::getDays(): $hari;
        $hari = TimeControl::getDays();
        $waktu = TimeControl::getTime();
        $tanggal = TimeControl::getDate();

        if($loginAs == 'Mahasiswa'){
            $data = Schedule::where('hari','=',$hari)
            ->where('kelas','=',$account->kelas)
            ->where('jam_selesai','>',$waktu)
            ->orderBy('jam_mulai','asc')->get();
        }else if($loginAs == 'Dosen'){
            $data = collect();
            $jadwal = Schedule::where('id_userdosen','=',$account->id_userdosen)
            ->where('hari','=',$hari)
            ->orderBy('jam_mulai','asc')->get();
            foreach($jadwal as $row){
                $absenDosen = AbsenDosen::where('id_jadwal','=',$row->id_jadwal)
                ->where('tanggal','=',$tanggal)->first();
                if(TimeControl::compareTime($waktu,$row->jam_selesai,'>') && $absenDosen == null) break;
                if($absenDosen == null || $absenDosen->waktu_selesai == null) $data->push($row);
            }
        }

        session()->put(['schedule' => $data]);
    }
}