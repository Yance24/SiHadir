<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $id_admin = $request->input('id_admin');
        $password = $request->input('password');

        $admin = Admin::where('id_admin', $id_admin)->first();

        if ($admin && $admin->password === $password) {
            // Login berhasil
            session()->put([
                'account' => $admin,
            ]);
            return redirect('/dashboard'); // Ganti dengan halaman yang sesuai
        } else {
            // Login gagal
            return redirect()->back()->withInput()->withErrors(['nama' => 'Login gagal. Periksa nama dan password Anda.']);
        }
    }
}
