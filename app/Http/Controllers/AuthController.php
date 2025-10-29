<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class AuthController extends Controller
{
    // 🟦 Menampilkan halaman login (GET)
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 🟨 Proses login (POST)
    public function login(Request $request)
    {
        $role = $request->validate([
            'role' => 'required|enum|"admin,staff"'
        ]
    );
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'loginError' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    // 🟩 Dashboard utama
    public function dashboard()
    {
        return view('dashboard');
    }

    public function exam(){
        return view('exam/index');
    }

    // 🔴 Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
