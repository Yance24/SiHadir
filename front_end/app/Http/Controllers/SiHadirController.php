<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiHadirController extends Controller
{
    //
    public function index(){
        $user = DB::table('user')->get();
        return view('admin.jadwal-akademik', ['user' => $user]);
    }
}
