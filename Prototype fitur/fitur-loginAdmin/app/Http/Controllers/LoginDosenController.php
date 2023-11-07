<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class LoginDosenController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.CobaLoginDosen');
    }

    public function CobaLoginDosen(Request $request)
    {
        $id_userdosen = $request->input('id_userdosen');
        $password = $request->input('password');

        $dosen = Dosen::where('id_userdosen', $id_userdosen)->first();

        if ($dosen && $dosen->password === $password) {
            // Login berhasil
            session()->put([
                'account' => $dosen,
            ]);
            return redirect('/dashboard'); // Ganti dengan halaman yang sesuai
        } else {
            // Login gagal
            return redirect()->back()->withInput()->withErrors(['nama' => 'Login gagal. Periksa nama dan password Anda.']);
        }
    }
}
