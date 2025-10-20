<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }

    // 🔽 Tambahkan method ini biar route staff.create berfungsi
    public function create()
    {
        return view('staff.create');
    }
}
