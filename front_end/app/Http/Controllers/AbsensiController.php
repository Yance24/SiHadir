<?php

namespace App\Http\Controllers;

use App\Models\AbsenDosen;
use App\Models\AbsenMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbsensiController extends Controller
{

    public function scanQr(Request $request){
        if(!LoginValidation::validateUser('Mahasiswa')) return redirect()->back();
        $idJadwal = $request->session()->get('homeSchedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->first();
        if($absenDosen != null){
            $waktu = TimeControl::getTime();
            $tanggal = TimeControl::getDate();
            $lateTime = TimeControl::operateTime($absenDosen->waktu_dosen, 900,'+');
            if(TimeControl::compareTime(TimeControl::getTime(),$lateTime,'>'))
            $status = 'Telat';
            else $status = 'Hadir';
            DB::table('absen_mahasiswa')->insert([
                'keterangan' => $status,
                'waktu_mahasiswa' => $waktu,
                'tanggal' => $tanggal,
                'id_user' => $request->session()->get('account')->id_user,
                'id_jadwal' => $idJadwal,
            ]);
        }
        return redirect('/Home');
    }

    public function generateQr(){
        if(!LoginValidation::validateUser('Dosen')) return redirect()->back();
        $idJadwal = session()->get('dashboardSchedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->first();
        if($absenDosen == null){
            $idQr = Str::random(5);
            $waktu = TimeControl::getTime();
            $tanggal = TimeControl::getDate();
            DB::table('absen_dosen')->insert([
                'id_jadwal' => $idJadwal,
                'id_userdosen' => session()->get('account')->id_userdosen,
                'waktu_dosen' => $waktu,
                'tanggal' => $tanggal,
                'id_QR' => $idQr,
            ]);
        }else{
            $idQr = $absenDosen->id_QR;
        }
        return redirect('/Test-QR')->with([
            'idQr' => $idQr,
        ]);
    }

    public static function checkEnableQR(){
        $account = session()->get('account');
        $homeSchedule = session()->get('homeSchedule');
        if($account['loginSebagai'] == 'mahasiswa'){
            if(
                $homeSchedule->count() == 0 || 
                TimeControl::compareTime(TimeControl::getTime(),$homeSchedule->first()->jam_mulai,'<') ||
                AbsenMahasiswa::where('id_user','=',$account['account']->id_user)->where('id_jadwal','=',$homeSchedule[0]->id_jadwal)->first() != null
            )return true;
            else return false;
        }else
        if($account['loginSebagai'] == 'dosen'){
            if(
                $homeSchedule->count() == 0 || 
                TimeControl::compareTime(TimeControl::getTime(),$homeSchedule->first()->jam_mulai,'<')
            )return true;
            else return false;
        }
    }
}