<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //menampilkan
    public function index()
    {
        $admins = Admin::all();

        return view('admin.index', ['admins'=>$admins]);
    }

    //Menambahkan
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required',
            'nama' => 'required',
            'password' => 'required',
        ]);

        Admin::create($request->all());

        return redirect()->route('admin.index')
            ->with('success', 'Admin berhasil ditambahkan.');
    }

    //Menghapus
    public function destroy($id)
    {
    $admin = Admin::find($id);

    if ($admin) {
        $admin->delete();
        return redirect()->route('admin.index')
            ->with('success', 'Admin berhasil dihapus.');
    }

    return redirect()->route('admin.index')
        ->with('error', 'Admin tidak ditemukan.');
   }

   //Mengedit
   
public function edit($id)
{
    $admin = Admin::find($id);

    if ($admin) {
        return view('admin.edit', compact('admin'));
    }

    return redirect()->route('admin.index')
        ->with('error', 'Admin tidak ditemukan.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'id_admin' => 'required',
        'nama' => 'required',
        'password' => 'required',
    ]);

    $admin = Admin::find($id);

    if ($admin) {
        $admin->update($request->all());
        return redirect()->route('admin.index')
            ->with('success', 'Admin berhasil diperbarui.');
    }

    return redirect()->route('admin.index')
        ->with('error', 'Admin tidak ditemukan.');
}
}
