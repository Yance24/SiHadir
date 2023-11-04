<?php

namespace App\Http\Controllers;

use App\Models\AbsenMahasiswa;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    public function processMahasiswaView(Request $request){
        if(!LoginValidation::validateUser('Mahasiswa')) return redirect()->back();

        return view('mahasiswa.perizinan');
    }

    public function processDosenView(Request $request){
        if(!LoginValidation::validateUser('Dosen')) return redirect()->back();

        ScheduleController::getSchedule();
        $data = $this->getAndParsePerizinan();
        return view('dosen.perizinan');
    }


    protected function getAndParsePerizinan(){
        $jadwal = session()->get('schedule');
        $tanggal = TimeControl::getDate();

        // $perizinan = Perizinan::where('tanggal','=',$tanggal)->get();

        $data = collect();
        
        foreach($jadwal as $item){
            $absenMahasiswa = AbsenMahasiswa::where('tanggal','=',$tanggal)
            ->where('id_jadwal','=',$jadwal->item)
            ->where('status','=','Pending')
            ->get();
            $data->push([
                'jadwal' => $item,
                'mahasiswa' => $absenMahasiswa,
            ]);
        }
        dd($data);
        return $data;
        
    }
}
