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
        if($request->session()->get('loginAs') != 'mahasiswa') return redirect()->back();
        $idJadwal = $request->session()->get('schedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->first();
        if($absenDosen != null){
            $waktu = TimeControl::getTime();
            $tanggal = session()->get('tanggal');
            $lateTime = TimeControl::operateTime($absenDosen->waktu_dosen, 900,'+');
            if(TimeControl::compareTime(TimeControl::getTime(),$lateTime,'>'))
            $status = 'Telat';
            else $status = 'Hadir';
            DB::table('absen mahasiswa')->insert([
                'keterangan' => $status,
                'waktu_mahasiswa' => $waktu,
                'id_user' => $request->session()->get('account')->id_user,
                'id_jadwal' => $idJadwal,
                'tanggal' => $tanggal,
            ]);
        }
        return redirect('/Home');
    }

    public function generateQr(Request $request){
        if($request->session()->get('loginAs') != 'dosen') return redirect()->back();
        $idJadwal = $request->session()->get('schedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->first();
        if($absenDosen == null){
            $idQr = Str::random(5);
            $waktu = TimeControl::getTime();
            $tanggal = session()->get('tanggal');
            DB::table('absen_dosen')->insert([
                'id_jadwal' => $idJadwal,
                'id_userdosen' => $request->session()->get('account')->id_userdosen,
                'waktu_dosen' => $waktu,
                'id_QR' => $idQr,
                'tanggal' => $tanggal,
            ]);
        }
        return redirect('/Home');
    }

    public function closeClass(Request $request){
        if($request->session()->get('loginAs') != 'dosen') return redirect()->back();
        $idJadwal = $request->session()->get('schedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->first();
        if($absenDosen != null){
            $tanggal = session()->get('tanggal');
            $waktu = TimeControl::getTime();
            DB::table('absen_dosen')
            ->where('id_jadwal','=',$idJadwal)
            ->where('tanggal','=',$tanggal)
            ->update([
                'waktu_selesai' => $waktu
            ]);
        }
        return redirect('/Home');
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

    public static function checkEnableTutupMakul(){
        $account = session()->get('account');
        
    }
}
