<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showByClass(Request $request)
    {
        $kelas = $request->input('pilihKelas');
        $semester = $request->input('semester');

        // Ambil data jadwal dari database berdasarkan semester dan kelas
        $jadwal = Jadwal::where('id_semester', $semester)
                         ->where('kelas', $kelas)
                         ->get();
        $message = $jadwal->isEmpty() ? 'Tidak ada data' : '';

        return view('jadwal2', compact('jadwal', 'message'));
    }
    public function ambilDataSemester(Request $request, $semester)
    {
        $semester = $request->input('pilihSemester');
        return view('jadwal.kelas', ['semester' => $semester]);
    }

}
