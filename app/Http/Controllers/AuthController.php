<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

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
        // Validate role input to ensure it is either 'admin' or 'staff'
        $request->validate([
            'role' => 'required|in:admin,staff', // Ensure role is either 'admin' or 'staff'
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Extract the credentials
        $credentials = $request->only('email', 'password');

        // Check if credentials are valid
        if (Auth::attempt($credentials)) {
            // Regenerate session to protect against session fixation
            $request->session()->regenerate();

            // Redirect to intended page (e.g., dashboard)
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'loginError' => 'Email atau password salah',
        ])->onlyInput('email');
    }

    // 🟩 Menampilkan halaman untuk reset password
    public function forgotpswd()
    {
        return view('auth.passwords'); // Default Laravel password reset view
    }

    // 🟪 Proses pengiriman email reset password
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email input
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Send the reset password link
        $response = Password::sendResetLink(
            $request->only('email')
        );

        // Check if the email was sent successfully
        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', 'We have emailed your password reset link!');
        }

        return back()->withErrors(['email' => 'Unable to send reset link. Please try again later.']);
    }

    // 🟩 Dashboard utama
    public function dashboard()
    {
        return view('dashboard');
    }

    public function exam()
    {
        return view('exam.index');
    }

    // 🔴 Logout
    public function logout(Request $request)
    {
        // Log the user out and invalidate session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to home page after logout
        return redirect('/');
    }
}
