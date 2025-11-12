<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Participant;

class AdminController extends Controller
{
      public function index()
    {
        // Get the total number of exams (Ujian)
        $totalUjian = Exam::count();  // Adjust this to your actual logic

        // Get the total number of participants (Peserta)
        $totalPeserta = Participant::count();  // Adjust this to your actual logic

        // Data for the Ujian chart
        $ujianLabels = ['Math', 'English', 'Science'];  // Example labels
        $ujianData = [150, 200, 120];  // Example data for each exam

        // Data for the Peserta chart
        $pesertaLabels = ['Active', 'Inactive', 'New'];  // Example labels
        $pesertaData = [80, 50, 70];  // Example data for participant categories

        // Pass the data to the view
        return view('admin.dashboard', compact('totalUjian', 'totalPeserta', 'ujianLabels', 'ujianData', 'pesertaLabels', 'pesertaData'));
    }

    // Manage Users (Admin only)
    public function manageUsers()
    {
        return view('admin.manage_users');
    }

    // Admin Settings
    public function settings()
    {
        return view('admin.settings');
    }

    // Admin Reports
    public function reports()
    {
        return view('admin.reports');
    }

    // Admin Analytics
    public function analytics()
    {
        return view('admin.analytics');
    }
}
