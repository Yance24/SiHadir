<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemindaiController extends Controller
{
    public function scanner()
    {
        return view('mahasiswa.pemindai');
    }
}
