<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;


class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('index', compact('jadwals'));
    }
    public function create()
    {
        // Tampilkan form untuk membuat jadwal
        return view('jadwal_create');
    }

    public function store(Request $request)
    {
        // Validasi request sesuai kebutuhan Anda
        $request->validate([
            'id_jadwal' => 'required',
            'id_makul' => 'required',
            'id_userdosen' => 'required',
            'id_semester' => 'required',
            'id_tahunajar' => 'required',
            'hari' => 'required',
            'kelas' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        // Data yang akan disimpan ke dalam tabel
        $data = [
            'id_jadwal' => $request->input('id_jadwal'),
            'id_makul' => $request->input('id_makul'),
            'id_userdosen' => $request->input('id_userdosen'),
            'id_semester' => $request->input('id_semester'),
            'id_tahunajar' => $request->input('id_tahunajar'),
            'hari' => $request->input('hari'),
            'kelas' => $request->input('kelas'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
        ];

        // Lakukan operasi insert menggunakan kelas DB
        DB::table('jadwal')->insert($data);

        return redirect('/jadwal')->with('success', 'Jadwal berhasil disimpan');
    }
}
