<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'kelamin' => 'required',
        ]);

        Mahasiswa::create($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa) {
            $mahasiswa->delete();
            return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
        }
        return redirect('/mahasiswa')->with('error', 'Data mahasiswa tidak ditemukan.');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'kelamin' => 'required',
        ]);

        Mahasiswa::where('id', $id)->update($validatedData);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }
}
