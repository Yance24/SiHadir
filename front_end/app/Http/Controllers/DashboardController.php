<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function processDosenView(Request $request){
        if(!LoginValidation::validateUser("Dosen")) return redirect()->back();
        ScheduleController::getSchedule();
        return view('dosen.dashboard');
    }

    public function processMahasiswaView(Request $request){
        if(!LoginValidation::validateUser("Mahasiswa")) return redirect()->back();

        ScheduleController::getSchedule();
        return view('mahasiswa.dashboard');
    }

    public function processAdminView(Request $request){
        if(!LoginValidation::validateUser("Admin")) return redirect()->back();

        $totalDosen = AdministrateController::getTotalDosen();
        $totalMahasiswa = AdministrateController::getTotalMahasiswa();

        return view('admin.dashboard',[
            'totalMahasiswa' => $totalMahasiswa,
            'totalDosen' => $totalDosen,
        ]);
    }
}