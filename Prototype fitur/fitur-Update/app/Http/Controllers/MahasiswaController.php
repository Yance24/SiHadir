<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all(); // Mengambil semua data jadwal dari tabel

        return view('mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();

        return view('mahasiswa.create', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_user' => [
                'required',
                Rule::unique('mahasiswa', 'id_user')
            ],
            'nama' => 'required|string|max:50',
            'kelamin' => 'required',
        ]);
        // Simpan data dosen
        $mahasiswa = new Mahasiswa;
        $mahasiswa->id_user = $request->input('id_user');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->kelamin = $request->input('kelamin');

        // Mengisi password dengan NIK
        $mahasiswa->password = $request->input('id_user');

        $mahasiswa->save();


        return redirect('/mahasiswa')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mmahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa, $id_user)
    {
        $mahasiswa = Mahasiswa::find($id_user);
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa, $id_user)
    {
        // Ambil data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::find($id_user);

        // Update data sesuai dengan input yang diterima
        $mahasiswa->id_user = $request->input('id_user');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->password = $request->input('password');
        $mahasiswa->kelamin = $request->input('kelamin');


        // Simpan perubahan ke database
        $mahasiswa->save();

        // Redirect kembali ke halaman data mahasiswa
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa, $id_user)
    {
        $mahasiswa = Mahasiswa::find($id_user);

        if (!$mahasiswa) {
            return redirect('/mahasiswa')->with('error', 'Data tidak ditemukan.');
        }

        $mahasiswa->delete();

        return redirect('/mahasiswa')->with('success', 'Data berhasil dihapus.');
    }
}
