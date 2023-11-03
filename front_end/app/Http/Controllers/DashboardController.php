<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function processDosenView(Request $request){
        if(!LoginValidation::validateUser("Dosen")) return redirect()->back();

        ScheduleController::getSchedule("Senin");
        ScheduleController::getDashboardSchedule("07:00:00");
        return view('dosen.dashboard');
    }

    public function processMahasiswaView(Request $request){
        if(!LoginValidation::validateUser("Mahasiswa")) return redirect()->back();

        ScheduleController::getSchedule("Senin");
        ScheduleController::getDashboardSchedule("07:00:00");
        return view('mahasiswa.dashboard');
    }
}