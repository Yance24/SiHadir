<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LoginMhsController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.LoginMahasiswa');
    }

    public function LoginMahasiswa(Request $request)
    {
        $id_user = $request->input('id_user');
        $password = $request->input('password');

        $mahasiswa = Mahasiswa::where('id_user', $id_user)->first();

        if ($mahasiswa && $mahasiswa->password === $password) {
            // Login berhasil
            session()->put([
                'account' => $mahasiswa,
            ]);
            return redirect('/dashboard'); // Ganti dengan halaman yang sesuai
        } else {
            // Login gagal
            return redirect()->back()->withInput()->withErrors(['nama' => 'Login gagal. Periksa nama dan password Anda.']);
        }
    }
}
