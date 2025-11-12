<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index'); // Halaman daftar report
    }

    public function create()
    {
        return view('reports.create'); // Halaman tambah report
    }
}
