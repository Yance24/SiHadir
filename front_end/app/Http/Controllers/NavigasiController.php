<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigasiController extends Controller
{
   public function absensi() {
        return view('mahasiswa.dashboard');
   }

   public function perizinan() {
    return view('mahasiswa.perizinan');
    }

    public function profil() {
    return view('mahasiswa.profil');
    }

    public function splahscreen() {
        return view('splashscreen');
   }

   public function dashboard() {
     return view('mahasiswa.dashboard');
     }
}
