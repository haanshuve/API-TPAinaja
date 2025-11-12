<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Controllers\Controller; // ← Tambahkan baris ini


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
 
    public function register(Request $request)
    {
 
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), 
            'role' => 'peserta',
        ]);

        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'message' => 'Registrasi berhasil dengan integritas data terjaga.',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

   
public function login(Request $request)
{
    // Validasi input
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Coba autentikasi user
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); 
        return redirect()->intended('/dashboard')
            ->with('success', 'Login berhasil!');
    }

    // Jika gagal
    return back()->withErrors([
        'email' => 'Email atau password tidak cocok.',
    ])->onlyInput('email');
}

    public function user(Request $request)
    {
        return response()->json(['user' => $request->user()]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout berhasil, token dihapus.']);
    }
    
}
