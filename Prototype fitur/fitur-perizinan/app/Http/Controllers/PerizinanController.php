<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaAccount;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerizinanController extends Controller
{
    public function processMahasiswaView(){
        $account = session()->get('account');
        $tanggal = session()->get('tanggal');
        $perizinan = Perizinan::where('id_user','=',$account->id_user)->where('tanggal','=',$tanggal)->where(function($query){
            $query->where('status_izin','=','pending')->orWhere('status_izin','=','valid');
        })->first();
        if($perizinan != null) $status = true;
        else $status = false;

        return view("perizinan-mahasiswa",[
            "statusIzin" => $status,
        ]);
    }

    public function processDosenView(){
        $jadwal = session()->get('jadwal');
        $tanggal = session()->get('tanggal');
        $mahasiswaJadwal = collect();
        foreach($jadwal as $item){
            $kelas = collect();

            $mahasiswa = MahasiswaAccount::where('kelas','=',$item->kelas)->get();
            foreach($mahasiswa as $item2){
                $perizinan = Perizinan::where('id_user','=',$item2->id_user)->where('tanggal','=',$tanggal)->where('status_izin','=','pending')->get();
                // echo $perizinan."<br>";
                if($perizinan->isNotEmpty()){
                    $kelas->push([
                        'account' => $item2,
                        'statusIzin' => 'ada',
                    ]);
                }else{
                    $kelas->push([
                        'account' => $item2,
                        'statusIzin' => 'belum ada',
                    ]);
                }
            }
            $mahasiswaJadwal->push($kelas);
            
        }
        // dd($mahasiswaJadwal);

        return view("perizinan-dosen",[
            "mahasiswaJadwal" => $mahasiswaJadwal,
        ]);
    }

    public function processPreviewFile(Request $request){
        $id = $request->input('buttonId');
        $id = decrypt($id);
        $tanggal = session()->get('tanggal');
        $perizinanDB = Perizinan::where('id_user','=',$id)->where('tanggal','=',$tanggal)->where('status_izin','=','pending')->first();
        
        $filePath = storage_path('app/'.$perizinanDB->surat);

        if(file_exists($filePath)){
            $fileContent = file_get_contents($filePath);
        }

        return view('previewSurat',[
            'fileContent' => $fileContent,
            'id' => $id,
        ]);
    }

    public function validasiPerizinan(Request $request){
        $tanggal = session()->get('tanggal');
        $waktu = session()->get('waktu');
        $input = $request->input('validateButton');
        $id = $request->input('id');
        $id = decrypt($id);
        $jadwal = session()->get('jadwal');
        if($input == 'ya'){
            DB::table('perizinan')->where('id_user','=',$id)->where('tanggal','=',$tanggal)->where('status_izin','=','pending')->update([
                'status_izin' => 'valid'
            ]);
            foreach($jadwal as $item){
                DB::table('absen_mahasiswa')->insert([
                    'keterangan' => 'Sakit',
                    'tanggal' => $tanggal,
                    'waktu_mahasiswa' => $waktu,
                    'id_user' => $id,
                    'id_jadwal' => $item->id_jadwal,
                ]);
            }
            return redirect('/perizinan-dosen');
        }else{
            DB::table('perizinan')->where('id_user','=',$id)->where('tanggal','=',$tanggal)->where('status_izin','=','pending')->update([
                'status_izin' => 'invalid'
            ]);
            return redirect('/perizinan-dosen');
        }
    }
}
