<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;


class ExamController extends Controller
{
    // 🔹 Tampilkan semua ujian
public function index()
{
    return view('exam.index');
}


    // 🔹 Form tambah ujian
    public function create()
    {
        return view('exam.create');
    }

    // 🔹 Simpan ujian baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'question_count' => 'required|integer',
            'duration' => 'required',
        ]);

        Exam::create($request->all());

        return redirect()->route('exam.index')->with('success', '✅ Ujian berhasil ditambahkan');
    }

    // 🔹 Edit ujian
    public function edit(Exam $exam)
    {
        return view('exam.edit', compact('exam'));
    }

    // 🔹 Update ujian
    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'question_count' => 'required|integer',
            'duration' => 'required',
        ]);

        $exam->update($request->all());
        return redirect()->route('exam.index')->with('success', '✅ Ujian berhasil diperbarui');
    }

    // 🔹 Hapus ujian
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('exam.index')->with('success', '🗑️ Ujian berhasil dihapus');
    }
}
