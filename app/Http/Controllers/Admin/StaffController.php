<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data staf baru
        return redirect()->route('staff.create')->with('success', 'Staf baru berhasil ditambahkan.');
    }
}
