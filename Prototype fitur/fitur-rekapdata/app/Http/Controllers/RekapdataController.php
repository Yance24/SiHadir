<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mahasiswaModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class RekapdataController extends Controller
{
    public function showSemester()
    {
        $mahasiswaData = mahasiswaModel::all();

        $groupedData = $mahasiswaData->groupBy('semester')->map(function ($classes) {
            return $classes->unique('kelas')->sortBy('kelas');
        });

        return view('dashboardrekapdata', ['groupedData' => $groupedData]);
    }

    public function classDetail($class, $semester)
    {
        $dataForClass = mahasiswaModel::where('kelas', $class)
            ->where('semester', $semester)
            ->orderBy('kelas')
            ->get();

        return view('rekapdata', ['class' => $class, 'semester' => $semester, 'dataForClass' => $dataForClass]);
    }
    public function downloadPDF($class, $semester)
    {
        // $dataForClass = mahasiswaModel::where('kelas', $class)->get();
        $dataForClass = mahasiswaModel::where('kelas', $class)
            ->where('semester', $semester)
            ->orderBy('kelas')
            ->get();

        $pdf = PDF::loadView('exportpdf', ['class' => $class, 'semester' => $semester, 'dataForClass' => $dataForClass]);

        return $pdf->download('rekapdata.pdf');
    }

    // public function listsemester()
    // {
    //     $semester = mahasiswaModel::pluck('semester')->unique();
    //     $kelas = mahasiswaModel::where('semester', $semester);
    //     return view('dashboard', ['semester' => $semester], ['kelas' => $kelas]);
    // }
}
