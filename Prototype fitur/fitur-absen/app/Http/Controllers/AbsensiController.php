<?php

namespace App\Http\Controllers;

use App\Models\AbsenDosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function scanQr(Request $request){
        if($request->session()->get('account')['loginSebagai'] != 'mahasiswa') return redirect('/Home');
        $waktu = TimeControl::getTime();
        $idJadwal = $request->session()->get('homeSchedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->first();
        if($absenDosen != null){
            $lateTime = TimeControl::operateTime($absenDosen->waktu_dosen, 900,'+');
            if(TimeControl::compareTime(TimeControl::getTime(),$lateTime,'>'))
            $status = 'Telat';
            else $status = 'Hadir' ;
            DB::table('absen mahasiswa')->insert([
                'keterangan' => $status,
                'waktu_mahasiswa' => $waktu,
                'id_user' => $request->session()->get('account')['account']->id_user,
                'id_jadwal' => $idJadwal,
            ]);
        }
        return redirect('/Home');
    }

    public function generateQr(Request $request){
        if($request->session()->get('account')['loginSebagai'] != 'dosen') return redirect('/Home');
        $waktu = TimeControl::getTime();
        $idJadwal = $request->session()->get('homeSchedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->first();
        if($absenDosen == null){
            DB::table('absen_dosen')->insert([
                'id_jadwal' => $idJadwal,
                'id_userdosen' => $request->session()->get('account')['account']->id_userdosen,
                'waktu_dosen' => $waktu,
            ]);
        }
        return redirect('/Home');
    }
}
