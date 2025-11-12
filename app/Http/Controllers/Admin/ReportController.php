<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('admin.reports.index'); // Halaman daftar report
    }

    public function create()
    {
        return view('admin.reports.create'); // Halaman tambah report
    }
}
