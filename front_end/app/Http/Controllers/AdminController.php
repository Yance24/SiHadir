<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DosenAccounts;
use App\Models\MahasiswaAccounts;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.data");
    }

    public function getData($model)
    {
        if ($model == 'mahasiswa') {
            $data = MahasiswaAccounts::all();
        } elseif ($model == 'dosen') {
            $data = DosenAccounts::all();
        } elseif ($model == 'admin') {
            $data = Admin::all();
        } else {
            // Handle case when model is not recognized
            abort(404);
        }

        return view('admin.data', compact('data', 'model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = Admin::all();

        return view('admin.dataAdmin.create', ['admin'=> $admin]);
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
            'id_admin' => [
                'required',
                    Rule::unique('admin', 'id_admin')],
            'nama' => 'required|string|max:50',
            'kelamin' => 'required',
        ]);
        // Simpan data dosen
        $admin = new Admin;
        $admin->id_admin = $request->input('id_admin');
        $admin->nama = $request->input('nama');
        $admin->kelamin = $request->input('kelamin');
    
        // Mengisi password dengan NIK
        $admin->password = $request->input('id_admin');

        $admin->save();
            
        
        return redirect('admin.dataAdmin.index')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin, $id_admin)
    {
        $admin = Admin::find($id_admin);
        return view('admin.dataAdmin.edit', ['admin'=> $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin, $id_admin)
    {
        // Ambil data mahasiswa berdasarkan ID
        $admin = Admin::find($id_admin);

        // Update data sesuai dengan input yang diterima
        $admin->id_admin = $request->input('id_admin');
        $admin->nama = $request->input('nama');
        $admin->password = $request->input('password');
        $admin->kelamin = $request->input('kelamin');
       

        // Simpan perubahan ke database
        $admin->save();

        // Redirect kembali ke halaman data mahasiswa
        return redirect('admin.dataAdmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin, $id_admin)
    {
        $admin = Admin::find($id_admin);

        $admin->delete();

        return redirect('/admin')->with('success', 'Data berhasil dihapus.');
    }
}
