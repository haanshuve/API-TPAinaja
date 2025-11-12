<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('admin.staff.index');
    }

    public function create()
    {
        // Define or retrieve roles (You can replace this with your actual roles, e.g., from a database)
        $roles = [ 'staff']; 
         $isDisabled = false; // Set this to `true` when you want to disable it

    return view('admin.staff.create', compact('roles', 'isDisabled'));
        
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data staf baru
        return redirect()->route('admin.staff.create')->with('success', 'Staf baru berhasil ditambahkan.');
    }
}
