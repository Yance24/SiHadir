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

    public function classDetail($class)
    {
        $dataForClass = mahasiswaModel::where('kelas', $class)->get();

        return view('rekapdata', ['class' => $class, 'dataForClass' => $dataForClass]);
    }
    public function downloadPDF($class)
    {
        $dataForClass = mahasiswaModel::where('kelas', $class)->get();

        $pdf = PDF::loadView('exportpdf', ['class' => $class, 'dataForClass' => $dataForClass]);

        return $pdf->download('rekapdata.pdf');
    }
}
