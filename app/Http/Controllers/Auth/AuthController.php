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
        return view('auth.login');  // Show login form
    }

    // Handle Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Redirect based on the user's role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');  // Redirect to admin dashboard
            } else {
                return redirect()->route('staff.dashboard');  // Redirect to staff dashboard
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle Logout
      public function logout(Request $request)
    {
        Auth::logout();  // Log the user out
        $request->session()->invalidate();  // Invalidate session
        $request->session()->regenerateToken();  // Regenerate CSRF token
        return redirect()->route('home');  // Redirect to the home page or login page
    }
}
