<?php

namespace App\Http\Controllers;

use App\Models\DosenAccounts;
use App\Models\MahasiswaAccounts;
use Illuminate\Http\Request;

class AdministrateController extends Controller
{
    public static function getTotalDosen(){
        $dosen = DosenAccounts::all();
        return $dosen->count();
    }

    public static function getTotalMahasiswa(){
        $mahasiswa = MahasiswaAccounts::all();
        return $mahasiswa->count();
    }
}
