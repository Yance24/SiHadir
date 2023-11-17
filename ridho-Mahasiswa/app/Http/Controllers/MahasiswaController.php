<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        
        return view('auth.Datamahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        
        return view('mahasiswa.create', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user'=> [
                'required',
                Rule::unique('mahasiswa','id_user')],
                'nama' => 'required',
                'kelas' => 'required',
                'kelamin' => 'required',
                'password' => 'required',
            ]);
            $mahasiswa = new Mahasiswa;
            $mahasiswa->id_user = $request->input('id_user');
            $mahasiswa->nama = $request->input('nama');
            $mahasiswa->kelas = $request->input('kelas');
            $mahasiswa->kelamin = $request->input('kelamin');
            $mahasiswa->password = $request->input('password');

            $mahasiswa->save();

            return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa, $id_user)
    {
        $mahasiswa= Mahasiswa::find($id_user);
        return view('mahasiswa.edit', ['mahasiswa'=>$mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa,$id_user)
    {
        $mahasiswa= Mahasiswa::find($id_user);
            $mahasiswa->id_user = $request->input('id_user');
            $mahasiswa->nama = $request->input('nama');
            $mahasiswa->kelas = $request->input('kelas');
            $mahasiswa->kelamin = $request->input('kelamin');
            $mahasiswa->password = $request->input('password');

            $mahasiswa->save();

            return redirect('/mahasiswa');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa, $id_user)
    {
        $mahasiswa= Mahasiswa::find($id_user);
        $mahasiswa->delete();
        return redirect('/mahasiswa');
    }
}
