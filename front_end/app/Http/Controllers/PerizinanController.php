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
            'schedule' => ScheduleController::getTodaysSchedule(),
        ]);
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

        // echo(
        //     '<script>
        //         console.log('.$pilihanJadwal.');
        //     </script>'
        // );

        // dd($pilihanJadwal, $perizinan, $tanggal, $file, $account);


        //make the timedSchedule
        foreach($pilihanJadwal as $idJadwal){
            $absenMahasiswa = AbsenMahasiswa::where('tanggal','=',$tanggal)
            ->where('id_user','=',$account->id_user)
            ->where('id_jadwal','=',$idJadwal)
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
}
