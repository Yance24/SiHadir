<?php

namespace App\Http\Controllers;

use App\Models\AbsenDosen;
use App\Models\Jadwal;
use App\Models\Semester;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function processView(){
        if(!LoginValidation::validateUser('Admin')) return redirect()->back();


        $data = $this->parseDataSemester();
        return view('admin.schedule',[
            'dataSemester' => $data,
        ]);
    }

    public function processKelasView(Request $request){
        if(!LoginValidation::validateUser('Admin')) return redirect()->back();

        $kelas = $request->input('kelas');
        $semester = $request->input('semester');
        
        $dataJadwal = Schedule::where('id_semester','=',$semester)
        ->where('kelas','=',$kelas)
        ->orderByRaw("FIELD(hari,'senin','selasa','rabu','kamis','jumat','sabtu','minggu')")
        ->orderBy('jam_mulai')
        ->get();

        return view('admin.kelas',[
            'dataJadwal' => $dataJadwal,
            'kelas' => $kelas,
            'semester' => $semester,
        ]);
    }

    protected function parseDataSemester(){
        $semester = Semester::all();
        $data = collect();
        foreach($semester as $item){
            $kelas = Kelas::where('semester','=',$item->id_semester)->orderBy('kelas','asc')->get();
            $data->push([
                'semester' => $item->id_semester,
                'kelas' => $kelas,
            ]);
        }
        return $data;
    }

    public static function getTodaysSchedule(){
        $loginAs = session()->get('loginAs');
        $account = session()->get('account');
        $hari = TimeControl::getDays();

        $data = collect();

        if($loginAs == 'Mahasiswa'){
            $data = Schedule::where('hari','=',$hari)
            ->where('kelas','=',$account->kelas)
            ->where('id_semester','=',$account->semester)
            ->orderBy('jam_mulai','asc')
            ->get();
        }else if($loginAs = 'Dosen'){
            $data = Schedule::where('id_userdosen','=',$account->id_userdosen)
            ->where('hari','=',$hari)
            ->orderBy('jam_mulai','asc')
            ->get();
        }
        return $data;
    }

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
            ->where('id_semester','=',$account->semester)
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
                if(TimeControl::compareTime($waktu,$row->jam_selesai,'>') && $absenDosen == null) continue;
                if($absenDosen == null || $absenDosen->waktu_selesai == null) $data->push($row);
            }
        }

        session()->put(['schedule' => $data]);
    }

    public function addSemester(){
        $totalSemester = Semester::all()->count() + 1;
        $keteranganSemester = ($totalSemester % 2) == 0? 'genap':'ganjil';
        DB::table('semester')->insert([
            'id_semester' => $totalSemester,
            'semester' => $keteranganSemester,
        ]);
        return response()->json([
            'status' => 'success',
        ]);
    }

    public function removeSemester(Request $request){   
        $totalSemester = Semester::all()->count();


        if(Kelas::where('semester','=',$totalSemester)->first() != null){
            if($request->has('operation')){
                DB::table('kelas')->where('semester','=',$totalSemester)->delete();
                DB::table('jadwal')->where('id_semester','=', $totalSemester)->delete();
            }else return response()->json([
                'status'=> 'needConfirmation',
            ]);
        }
        
        DB::table('semester')->where('id_semester','=',$totalSemester)->delete();
        return response()->json([
            'status'=> 'success',
        ]);
    }

    public function addKelas(Request $request){
        $selectedSemester = $request->input('selectedSemester');
        $kelasName = $request->input('kelasName');

        DB::table('kelas')->insert([
            'semester' => $selectedSemester,
            'kelas' => $kelasName,
        ]);

        return response()->json([
            'status'=> 'success',
        ]);
    }

    public function removeKelas(Request $request){
        $semester = $request->input('semester');
        $kelas = $request->input('kelas');

        DB::table('kelas')
        ->where('semester','=', $semester)
        ->where('kelas','=',$kelas)
        ->delete();

        return response()->json([
            'status'=> 'success',
        ]);
    }
}