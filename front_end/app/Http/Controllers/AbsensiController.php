<?php

namespace App\Http\Controllers;

use App\Models\AbsenDosen;
use App\Models\AbsenMahasiswa;
use Illuminate\Http\Request;
use App\Models\MahasiswaAccounts;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbsensiController extends Controller
{

    public function processScanQrView(){
        if(!LoginValidation::validateUser('Mahasiswa')) return redirect()->back();

        return view('mahasiswa.pemindai');
    }

    public function scanQr(Request $request){
        if(!LoginValidation::validateUser('Mahasiswa')) return redirect()->back();

        $idQr = $request->input('idQr');
        $idJadwal = $request->session()->get('schedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->first();

        // dd('tes');

        if($absenDosen->id_QR == 'INVALID') return response()->json([
            'status' => 'invalid'
        ]);

        if($idQr != $absenDosen->id_QR) return response()->json([
            'status' => 'salah'
        ]);


        if($absenDosen != null){
            $waktu = TimeControl::getTime();
            $tanggal = TimeControl::getDate();
            $lateTime = TimeControl::operateTime($absenDosen->waktu_dosen, '00:15:00','+');
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

        

        return response()->json([
            'status' => 'valid'
        ]);
    }

    public function generateQr(){
        if(!LoginValidation::validateUser('Dosen')) return redirect()->back();
        $idJadwal = session()->get('schedule')->first()->id_jadwal;
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
        return redirect('/dosen/dashboard/displayQr')->with([
            'idQr' => $idQr,
        ]);
    }

    public function closeClass(Request $request){
        if(!LoginValidation::validateUser('Dosen')) return response()->json([
            'status' => 'invalid authorities!'
        ]);


        $jadwal = $request->session()->get('schedule')->first();
        $idJadwal = $jadwal->id_jadwal;
        $tanggal = TimeControl::getDate();
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->where('tanggal','=',$tanggal)->first();
        if($absenDosen != null){
            $waktu = TimeControl::getTime();
            DB::table('absen_dosen')
            ->where('id_jadwal','=',$idJadwal)
            ->where('tanggal','=',$tanggal)
            ->update([
                'waktu_selesai' => $waktu,  
                'id_QR' => 'INVALID',
            ]);
            
            // $mahasiswa = MahasiswaAccounts::where('kelas','=',$jadwal->kelas)->get();
            // foreach($mahasiswa as $item){
            //     $this->accumulateData($item, $absenDosen, $tanggal);
            //     $this->operateStatusChange($item);
            // }
            // dd();
        }        
        return response()->json([
            'status' => 'success'
        ]);
    }

    public static function checkEnableQR(){
        $account = session()->get('account');
        $loginAs = session()->get('loginAs');
        $tanggal = TimeControl::getDate();
        $homeSchedule = session()->get('schedule');
        if($loginAs == 'Mahasiswa'){
            if(
                $homeSchedule->count() == 0 || 
                TimeControl::compareTime(TimeControl::getTime(),$homeSchedule->first()->jam_mulai,'<') ||
                AbsenMahasiswa::where('id_user','=',$account->id_user)
                ->where('id_jadwal','=',$homeSchedule[0]->id_jadwal)
                ->where('tanggal','=',$tanggal)
                ->first() != null
            )return true;
            else return false;
        }else
        if($loginAs == 'Dosen'){
            if(
                $homeSchedule->count() == 0 || 
                TimeControl::compareTime(TimeControl::getTime(),$homeSchedule->first()->jam_mulai,'<')
            )return true;
            else return false;
        }
    }

    public static function checkEnableTutupMakul(){
        $account = session()->get('account');
        $tanggal = TimeControl::getDate();
        $homeSchedule = session()->get('schedule');

        if($homeSchedule->count() == 0)return true;
        
        $absenDosen = AbsenDosen::where('tanggal','=',$tanggal)
        ->where('id_jadwal','=',$homeSchedule[0]->id_jadwal)
        ->first();
        if(!($absenDosen != null && $absenDosen->waktu_selesai == null)) return true;
        else return false;
    }
}