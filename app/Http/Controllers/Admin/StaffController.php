<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class StaffController extends Controller
{
    public function index()
    {
        // Ambil semua user dengan role 'staff'
        $staff = User::where('role', 'staff')->get();

        // Kirim ke view
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        // Jika nanti butuh role list, isi di sini
        // $roles = ['staff'];  
        // $isDisabled = false;

        return view('admin.staff.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'staff',
    ]);

    return redirect()->route('admin.staff.index')
        ->with('success', 'Staff baru berhasil ditambahkan.');
}

}
