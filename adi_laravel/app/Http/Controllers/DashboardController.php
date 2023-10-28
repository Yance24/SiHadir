<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function processDosenView(Request $request){
        if(!LoginValidation::validateUser("Dosen")) return redirect('/login');

        ScheduleController::getSchedule("Senin");
        ScheduleController::getDashboardSchedule("07:00:00");
        return view('dosen.dashboard');
    }

    public function processMahasiswaView(Request $request){
        if(!LoginValidation::validateUser("Mahasiswa")) return redirect('/login');

        //will be uncommented after the frontend create the dashboard for the mahasiswa
        //return view('mahasiswa.dashboard');
    }
}
