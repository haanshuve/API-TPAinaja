<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam; // pastikan model Exam sudah ada

class ExamController extends Controller
{
    public function index()
    {
        // Ambil semua data ujian dari tabel exams
        $exams = Exam::all();

        // Kirim ke view
        return view('exam.index', compact('exams'));
    }

    public function create()
    {
        return view('exam.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_test' => 'required|string|max:255',
            'jumlah_soal' => 'required|numeric',
            'bobot' => 'required|numeric',
            'waktu' => 'required|numeric',
        ]);

        // Simpan ke database (pastikan field di model cocok dengan kolom tabel)
        Exam::create([
            'name' => $request->nama_test,
            'question_count' => $request->jumlah_soal,
            'weight' => $request->bobot,
            'time' => $request->waktu,
        ]);

        return redirect()->route('exam.index')->with('success', 'Ujian berhasil ditambahkan!');
    }
}
