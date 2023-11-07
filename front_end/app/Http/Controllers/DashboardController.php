<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function processDosenView(Request $request){
        if(!LoginValidation::validateUser("Dosen")) return redirect()->back();
        ScheduleController::getSchedule();
        $enableAbsent = AbsensiController::checkEnableQR();
        $enableCloseClass = AbsensiController::checkEnableTutupMakul();
        return view('dosen.dashboard',[
            'enableGenerateButton' => !$enableAbsent,
            'enableCloseClass' => !$enableCloseClass,
        ]);
    }

    public function processQrView(Request $request){
        if(
            !LoginValidation::validateUser('Dosen') ||
            !session()->has('idQr')
        )
        return redirect()->back();

        return view('dosen.qrDisplay');
    }

    public function processMahasiswaView(Request $request){
        if(!LoginValidation::validateUser("Mahasiswa")) return redirect()->back();

        ScheduleController::getSchedule();
        $enableAbsent = AbsensiController::checkEnableQR();
        dd($enableAbsent);
        return view('mahasiswa.dashboard',[
            'enableScanButton' => !$enableAbsent,
        ]);
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