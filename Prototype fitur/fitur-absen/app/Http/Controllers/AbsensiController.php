<?php

namespace App\Http\Controllers;

use App\Models\AbsenDosen;
use App\Models\AbsenMahasiswa;
use App\Models\MahasiswaAccounts;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AbsensiController extends Controller
{

    public function scanQr(Request $request){
        if($request->session()->get('loginAs') != 'mahasiswa') return redirect()->back();
        $tanggal = session()->get('tanggal');
        $idJadwal = $request->session()->get('schedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->where('tanggal','=',$tanggal)->first();
        if($absenDosen != null){
            $waktu = TimeControl::getTime();
            $lateTime = TimeControl::operateTime($absenDosen->waktu_dosen, '00:15:00','+');
            if(TimeControl::compareTime(TimeControl::getTime(),$lateTime,'>'))
            $status = 'Telat';
            else $status = 'Hadir';
            DB::table('absen_mahasiswa')->insert([
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
        $tanggal = session()->get('tanggal');
        $idJadwal = $request->session()->get('schedule')->first()->id_jadwal;
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->where('tanggal','=',$tanggal)->first();
        if($absenDosen == null){
            $idQr = Str::random(5);
            $waktu = TimeControl::getTime();
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
        $jadwal = $request->session()->get('schedule')->first();
        $idJadwal = $jadwal->id_jadwal;
        $tanggal = session()->get('tanggal');
        $absenDosen = AbsenDosen::where('id_jadwal','=',$idJadwal)->where('tanggal','=',$tanggal)->first();

        if($absenDosen != null){
            $tanggal = session()->get('tanggal');
            $waktu = TimeControl::getTime();
            DB::table('absen_dosen')
            ->where('id_jadwal','=',$idJadwal)
            ->where('tanggal','=',$tanggal)
            ->update([
                'waktu_selesai' => $waktu,  
                'id_QR' => 'INVALID',
            ]);
            
            $mahasiswa = MahasiswaAccounts::where('kelas','=',$jadwal->kelas)->get();
            foreach($mahasiswa as $item){
                $this->accumulateData($item, $absenDosen, $tanggal);
                $this->operateStatusChange($item);
            }
            dd();
        }        
        return redirect('/Home');
    }

    protected function accumulateData($mahasiswa, $absenDosen, $tanggal){
        $absen = AbsenMahasiswa::where('tanggal','=',$tanggal)
        ->where('id_jadwal','=',$absenDosen->id_jadwal)
        ->where('id_user','=',$mahasiswa->id_user)
        ->get();

        $jadwal = Schedule::where('id_jadwal','=',$absenDosen->id_jadwal)->first();
        echo $mahasiswa->nama.'<br>';

        if($absen->count() <= 0){
            echo 'tanpa keterangan!<br>';
            $waktu_mulai = $jadwal->jam_mulai;
            $waktu_selesai = $jadwal->jam_selesai;
            $this->operateTimeSlot($waktu_mulai, $waktu_selesai,'Alpa',$mahasiswa);
            return;
        }
        $status = '';
        for($i = 0; $i < $absen->count();$i++){
            switch($absen[$i]->keterangan){
                case 'Hadir':
                    echo 'Hadir!<br>';
                    if($status != ''){
                        $this->operateTimeSlot($absen[$i-1]->waktu_mahasiswa, $absen[$i]->waktu_mahasiswa, $status,$mahasiswa);
                    }
                    $status = 'Hadir';
                    break;
                
                case 'Telat':
                    echo 'Telat!<br>';
                    $this->operateTimeSlot($absenDosen->waktu_dosen, $absen[$i]->waktu_mahasiswa, 'Alpa',$mahasiswa);
                    $status = 'Hadir';
                    break;

                case 'Sakit':
                    echo 'Sakit!<br>';
                    $status = 'Sakit';
                    break;

                case 'Alpa':
                    echo 'Alpa!<br>';
                    $status ='Alpa';
                    break;
                
                case 'Ijin':
                    echo 'Ijin!<br>';
                    $status = 'Ijin';
                    break;

                // case 'Sakit_Surat':
                    
                //     break;
            }
        }
        // dd($absenDosen);
        $this->operateTimeSlot($absen[$absen->count() - 1]->waktu_mahasiswa,$absenDosen->jam_selesai,$status,$mahasiswa);
    }

    protected function operateTimeSlot($waktuSebelum, $waktuSekarang, $status, $mahasiswa){
        $deltaTime = TimeControl::operateTime($waktuSekarang,$waktuSebelum,'-',false);
        $jam = ceil($deltaTime / 3000);

        if($status == 'Sakit')
        DB::table('mahasiswa')->where('id_user','=',$mahasiswa->id_user)->update([
            'jumlah_sakit' => $mahasiswa->jumlah_sakit + $jam,
        ]);

        if($status == 'Izin')
        DB::table('mahasiswa')->where('id_user','=',$mahasiswa->id_user)->update([
            'jumlah_izin' => $mahasiswa->jumlah_izin + $jam,
        ]);

        if($status == 'Alpa')
        DB::table('mahasiswa')->where('id_user','=',$mahasiswa->id_user)->update([
            'jumlah_alpa' => $mahasiswa->jumlah_alpa + $jam,
        ]);
    }

    protected function operateStatusChange($mahasiswa){
        $mahasiswa = MahasiswaAccounts::where('id_user','=',$mahasiswa->id_user)->first();
        $status = '';

                        if($mahasiswa->jumlah_alpa >= 45) $status = 'DO';
        else if(($mahasiswa->jumlah_sakit + $mahasiswa->jumlah_izin) >= 114) $status = 'SO';
        else{
            if($mahasiswa->jumlah_alpa >= 16) $status = 'SP1';
            else if($mahasiswa->jumlah_alpa >= 32) $status = 'SP2';
            else if($mahasiswa->jumlah_alpa >= 38) $status = 'SP3';
        }
        
        DB::table('mahasiswa')->where('id_user','=', $mahasiswa->id_user)->update([
            'status' => $status,
        ]);
    }

    public static function checkEnableQR(){
        $account = session()->get('account');
        $loginAs = session()->get('loginAs');
        $tanggal = session()->get('tanggal');
        $homeSchedule = session()->get('schedule');
        if($loginAs == 'mahasiswa'){
            if(
                $homeSchedule->count() == 0 || 
                TimeControl::compareTime(TimeControl::getTime(),$homeSchedule->first()->jam_mulai,'<') ||
                AbsenMahasiswa::where('id_user','=',$account->id_user)
                ->where('id_jadwal','=',$homeSchedule[0]->id_jadwal)
                ->first() != null
            )return true;
            else return false;
        }else
        if($loginAs == 'dosen'){
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
