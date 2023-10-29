<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function kirimPerizinan(Request $request){

        $nim = session()->get('account')->id_user;
        $tanggal = session()->get('tanggal');

        // $jadwal = session()->get('jadwal');
        // $idJadwal = collect();
        // foreach($jadwal as $item){
        //     $idJadwal->push($item->id_jadwal);
        // }

        $uploadedFile = $request->file('file');
        $fileName = $uploadedFile->store('perizinan');

        DB::table('perizinan')->insert([
            'id_user' => $nim,
            'tanggal' => $tanggal,
            'surat' => $fileName,
        ]);

        return redirect()->back();
    }
}
