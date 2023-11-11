<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class Controller extends Controller
{
    public function showdatabase(): view
    {
        $mahasiswas = DB::table('mahasiswa')->select('id_user', 'nama', 'kelas')->get();
        return view('mahasiswa.index', ['mahasiswas' => $mahasiswas]);
    }
    public function testfun()
    {
        return 'test darasr';
    }
}
