<?php

namespace App\Http\Controllers;

use App\Models\AbsenMahasiswa;
use App\Models\Schedule;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PerizinanController extends Controller
{
    public function processMahasiswaView(Request $request){
        if(!LoginValidation::validateUser('Mahasiswa')) return redirect()->back();

        $perizinan = $request->input('perizinan');
        if($perizinan == null) return view('mahasiswa.jenisPerizinan');

        return view('mahasiswa.perizinan',[
            'perizinan' => $perizinan,
            'schedule' => $this->getAvailableIzin(),
        ]);
    }

    protected function getAvailableIzin(){
        $jadwal = ScheduleController::getTodaysSchedule();
        $tanggal = TimeControl::getDate();

        $account = session()->get('account');

        $data = collect();

        foreach($jadwal as $item){
            $absenMahasiswa = AbsenMahasiswa::where('id_user','=',$account->id_user)
            ->where('tanggal','=',$tanggal)
            ->where('id_jadwal','=',$item->id_jadwal)
            ->where(function($query){
                $query->
                where('keterangan','=','Pending')->
                orWhere('keterangan','=','Sakit')->
                orWhere('keterangan','=','Ijin');
            })
            ->first();
            
            if($absenMahasiswa == null) $data->push($item);
        }

        return $data;
        
    }


    public function processDosenView(Request $request){
        if(!LoginValidation::validateUser('Dosen')) return redirect()->back();

        ScheduleController::getSchedule();
        $data = $this->getAndParsePerizinan();
        return view('dosen.perizinan',[
            'parsedPerizinan' => $data,
        ]);
    }


    protected function getAndParsePerizinan(){
        $jadwal = session()->get('schedule');
        $tanggal = TimeControl::getDate();

        // $perizinan = Perizinan::where('tanggal','=',$tanggal)->get();

        $data = collect();
        
        foreach($jadwal as $item){
            $absenMahasiswa = AbsenMahasiswa::where('tanggal','=',$tanggal)
            ->where('id_jadwal','=',$item->id_jadwal)
            ->where('keterangan','=','Pending')
            ->get();
            
            $data->push([
                'jadwal' => $item,
                'mahasiswa' => $absenMahasiswa,
            ]);
        }
        return $data;
        
    }

    public function sendFile(Request $request){
        $pilihanJadwal = explode(',',$request->input('jadwal'));
        $perizinan = $request->input('jenisPerizinan');
        $tanggal = TimeControl::getDate();
        $file = $request->file('file-izin');
        $account = session()->get('account');

        //make the timedSchedule
        foreach($pilihanJadwal as $idJadwal){
            $absenMahasiswa = AbsenMahasiswa::where('tanggal','=',$tanggal)
            ->where('id_user','=',$account->id_user)
            ->where('id_jadwal','=',$idJadwal)
            ->where('keterangan','!=','Invalid')
            ->get();

            if($absenMahasiswa->count() > 0){
                $waktu = TimeControl::getTime();
            }else{
                $waktu = Schedule::where('id_jadwal','=',$idJadwal)->first()->jam_mulai;
            }

            DB::table('absen_mahasiswa')->insert([
                'keterangan' => 'pending',
                'tanggal' => $tanggal,
                'waktu_mahasiswa' => $waktu,
                'id_user' => $account->id_user,
                'id_jadwal' => $idJadwal,
            ]);

            $id_absenMahasiswa = DB::getPdo()->lastInsertId();

            $fileName = $file->store('perizinan');

            DB::table('perizinan')->insert([
                'id_absenMahasiswa' => $id_absenMahasiswa,
                'tanggal' => $tanggal,
                'surat' => $fileName,
                'tipe_izin' => $perizinan,
                'status_izin' => 'pending',
            ]);
        }
        
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function requestPdf($idUser){
        $path = Perizinan::where('id_absenMahasiswa','=',$idUser)->where('status_izin','=','pending')->first()->surat;
        $path = storage_path('app/'.$path);

        if(file_exists($path))
            return response()->file($path);
        else return response()->json([
            'error' => 'Surat izin Not Found'
        ],400);
        
    }

    public function validateIzin(Request $request){
        $idAbsenMahasiswa = $request->input('idUser');

        $tipeIzin = Perizinan::where('id_absenMahasiswa','=',$idAbsenMahasiswa)->first()->tipe_izin;

        DB::table('absen_mahasiswa')->where('id_absenMahasiswa','=',$idAbsenMahasiswa)->update([
            'keterangan' => $tipeIzin,
        ]);

        DB::table('perizinan')->where('id_absenMahasiswa','=',$idAbsenMahasiswa)->update([
            'status_izin' => 'valid',
        ]);

        return response()->json([
            'status'=> 'success'
        ]);
    }

    public function invalidateIzin(Request $request){
        $idAbsenMahasiswa = $request->input('idUser');

        DB::table('absen_mahasiswa')->where('id_absenMahasiswa','=',$idAbsenMahasiswa)->update([
            'keterangan' => 'Invalid',
        ]);

        DB::table('perizinan')->where('id_absenMahasiswa','=',$idAbsenMahasiswa)->update([
            'status_izin' => 'invalid',
        ]);

        return response()->json([
            'status'=> 'success'
        ]);
    }
}
