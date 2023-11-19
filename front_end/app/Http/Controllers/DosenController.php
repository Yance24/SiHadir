<?php

namespace App\Http\Controllers;

use App\Models\DosenAccounts;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = DosenAccounts::all(); // Mengambil semua data jadwal dari tabel
    
        return view('admin.dataDosen.index', ['dosen' => $dosen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = DosenAccounts::all();

        return view('admin.dataDosen.create', ['dosen'=> $dosen]);
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
            'id_userdosen' => [
                'required',
                    Rule::unique('dosen', 'id_userdosen')],
            'nama' => 'required|string|max:50',
            'kelamin' => 'required',
        ]);
        // Simpan data dosen
        $dosen = new DosenAccounts;
        $dosen->id_userdosen = $request->input('id_userdosen');
        $dosen->nama = $request->input('nama');
        $dosen->kelamin = $request->input('kelamin');
    
        // Mengisi password dengan NIK
        $dosen->password = $request->input('id_userdosen');

        $dosen->save();
            
        
        return redirect('/admin/user-data/dosen')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DosenAccounts  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(DosenAccounts $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DosenAccounts  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(DosenAccounts $dosen, $id_userdosen)
    {
        $dosen = DosenAccounts::find($id_userdosen);
        return view('admin.dataDosen.edit', ['dosen'=> $dosen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DosenAccounts  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DosenAccounts $dosen, $id_userdosen)
    {
        // Ambil data mahasiswa berdasarkan ID
        $dosen = DosenAccounts::find($id_userdosen);

        // Update data sesuai dengan input yang diterima
        $dosen->id_userdosen = $request->input('id_userdosen');
        $dosen->nama = $request->input('nama');
        $dosen->password = $request->input('password');
        $dosen->kelamin = $request->input('kelamin');
       

        // Simpan perubahan ke database
        $dosen->save();

        // Redirect kembali ke halaman data mahasiswa
        return redirect('/admin/user-data/dosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DosenAccounts  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(DosenAccounts $dosen, $id_userdosen)
    {
        $dosen = DosenAccounts::find($id_userdosen);

        if (!$dosen) {
            return redirect('/admin/user-data/dosen')->with('error', 'Data tidak ditemukan.');
        }

        $dosen->delete();

        return redirect('/admin/user-data/dosen')->with('success', 'Data berhasil dihapus.');
    }
}
