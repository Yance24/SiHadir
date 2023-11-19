<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapDataController extends Controller
{
    public function processView(){
        if(!LoginValidation::validateUser('Admin')) return redirect()->back();

        return view('admin.rekap.schedule',[
            'dataSemester' => ScheduleController::parseDataSemester(),
        ]);
    }

    public function processKelasView(Request $request){
        if(!LoginValidation::validateUser('Admin')) return redirect()->back();

        $kelas = $request->input('kelas');
        $semester = $request->input('semester');

        if($kelas == null || $semester == null) return redirect('/admin/rekapData');
        
        if($request->has('search')){
            $dataMahasiwa = MahasiswaAccounts::where('kelas','=',$kelas)
            ->where('id_user','like','%'.$request->input('search').'%')
            ->where('semester','=',$semester)
            ->orderBy('id_user','asc')
            ->get();   
        }else{
            $dataMahasiwa = MahasiswaAccounts::where('kelas','=',$kelas)
            ->where('semester','=',$semester)
            ->orderBy('id_user','asc')
            ->get();
        }
        
        $viewMahasiwa = $this->parseDataRekap($dataMahasiwa);

        $editMode = $request->has('edit');
        

        return view('admin.rekap.kelas',[
            'viewMahasiswa' => $viewMahasiwa,
            'semester' => $semester,
            'kelas' => $kelas,
            'editMode' => $editMode,
        ]);
    }

    protected function parseDataRekap($dataMahasiswa){
        $data = collect();
        foreach($dataMahasiswa as $mahasiswa){
            $jumlah = $mahasiswa->jumlah_alpa + $mahasiswa->jumlah_izin + $mahasiswa->jumlah_sakit;
            // $kompensasi = $this->countKompensasi($mahasiswa->jumlah_alpa);
            $data->push([
                'mahasiswa' => $mahasiswa,
                'jumlah' => $jumlah,
                // 'kompensasi' => $kompensasi,
            ]);
        }
        return $data;
    }

    // protected function countKompensasi($jumlahAlpa){
    //     if($jumlahAlpa <= 1) return $jumlahAlpa * 5;
    //     else if($jumlahAlpa < 8) return 8;
    //     else return $jumlahAlpa * 2;
    // }

    public function updateChanges(Request $request){
        $idUser = explode(',',$request->input('idUser'));
        $jumlahAlpa = explode(',',$request->input('jumlahAlpa'));
        $jumlahIzin = explode(',',$request->input('jumlahIzin'));
        $jumlahSakit = explode(',',$request->input('jumlahSakit'));
        $status = explode(',',$request->input('status'));
        $kompensasi = explode(',',$request->input('kompensasi'));

        for($i = 0; $i < count($idUser); $i++){
            DB::table('mahasiswa')->where('id_user','=',$idUser[$i])->update([
                'jumlah_alpa' => $jumlahAlpa[$i],
                'jumlah_izin' => $jumlahIzin[$i],
                'jumlah_sakit' => $jumlahSakit[$i],
                'status' => $status[$i],
                'kompensasi' => $kompensasi[$i],
            ]);
        }

        return response()->json([
            'status' => 'success',
            
        ]);

    }
}
