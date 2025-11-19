<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle Login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'role' => 'required|string'
        ]);

        // Ambil data login
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role  
        ];

        // Coba login
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;

            // Redirect sesuai role
            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($role === 'staff') {
                return redirect()->route('staff.dashboard');
            }

            if ($role === 'peserta') {
                return redirect()->route('peserta.dashboard');
            }

            // Role tidak dikenali
            Auth::logout();
            return back()->withErrors([
                'loginError' => 'Role tidak dikenali.'
            ]);
        }

        // Jika gagal login
        return back()->withErrors([
            'loginError' => 'Email / Password / Role salah!'
        ]);
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
