<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Matakuliah;
use App\Models\Semester;
use App\Models\Tahun_ajar;
use App\Models\Dosen;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::all(); // Mengambil semua data jadwal dari tabel
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();
    
        return view('jadwal', [
            'jadwal' => $jadwal,
            'makuls' => $matakuliah,
            'dosens'=> $dosen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Jadwal $jadwal)
    {
        $jadwal = Jadwal::all();
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();
        $semester = Semester::all();
        $tahun_ajar = Tahun_ajar::all();
        return view('jadwal.create', [
            'jadwals' => $jadwal,
            'makuls' => $matakuliah,
            'dosens' => $dosen,
            'semesters' => $semester,
            'tahun_ajars' => $tahun_ajar,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $data = $request->validate([
            'id_makul' => 'required',
            'id_userdosen' => 'required',
            'id_semester' => 'required',
            'id_tahunajar' => 'required',
            'hari' => 'required|string',
            'kelas' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
    
        Jadwal::create($data);
    
        return redirect('/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal, Matakuliah $matakuliah, Dosen $dosen, Semester $semester, Tahun_ajar $tahun_ajar, $id_jadwal)
    {
        $jadwal = Jadwal::find($id_jadwal); // Mengambil data mahasiswa berdasarkan ID
        $matakuliah = Matakuliah::all();
        $dosen = Dosen::all();
        $semester = Semester::all();
        $tahun_ajar = Tahun_ajar::all();

        return view('jadwal.edit', [
            'jadwal' => $jadwal,
            'makuls' => $matakuliah,
            'dosens' => $dosen,
            'semesters' => $semester,
            'tahun_ajars' => $tahun_ajar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal, $id_jadwal)
    {
        // Ambil data mahasiswa berdasarkan ID
        $jadwal = Jadwal::find($id_jadwal);

        // Update data sesuai dengan input yang diterima
        $jadwal->id_makul = $request->input('id_makul');
        $jadwal->id_userdosen = $request->input('id_userdosen');
        $jadwal->id_semester = $request->input('id_semester');
        $jadwal->id_tahunajar = $request->input('id_tahunajar');
        $jadwal->hari = $request->input('hari');
        $jadwal->kelas = $request->input('kelas');
        $jadwal->jam_mulai = $request->input('jam_mulai');
        $jadwal->jam_selesai = $request->input('jam_selesai');
        $jadwal->id_jadwal = $request->input('id_jadwal');
        // Update properti lainnya sesuai dengan input yang diterima

        // Simpan perubahan ke database
        $jadwal->save();

        // Redirect kembali ke halaman data mahasiswa
        return redirect('/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal, $id_jadwal)
    {
        $jadwal = Jadwal::find($id_jadwal);

        if (!$jadwal) {
            return redirect('/jadwal')->with('error', 'Data tidak ditemukan.');
        }

        $jadwal->delete();

        return redirect('/jadwal')->with('success', 'Data berhasil dihapus.');
    }
}
