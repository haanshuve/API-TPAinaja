<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // 🔹 Menampilkan daftar soal untuk ujian tertentu
    public function index($exam_id)
    {
        $exam = Exam::findOrFail($exam_id);
        $questions = $exam->questions;
        return view('questions.index', compact('exam', 'questions'));
    }

    // 🔹 Form tambah soal
    public function create($exam_id)
    {
        $exam = Exam::findOrFail($exam_id);
        return view('questions.create', compact('exam'));
    }

    // 🔹 Simpan soal baru
    public function store(Request $request, $exam_id)
    {
        $request->validate([
            'question_text' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:A,B,C,D',
        ]);

        $exam = Exam::findOrFail($exam_id);
        $exam->questions()->create($request->all());

        return redirect()->route('questions.index', $exam->id)
                         ->with('success', '✅ Soal berhasil ditambahkan!');
    }

    // 🔹 Form edit soal
    public function edit($exam_id, Question $question)
    {
        $exam = Exam::findOrFail($exam_id);
        return view('questions.edit', compact('exam', 'question'));
    }

    // 🔹 Update soal
    public function update(Request $request, $exam_id, Question $question)
    {
        $request->validate([
            'question_text' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'correct_answer' => 'required|in:A,B,C,D',
        ]);

        $question->update($request->all());

        return redirect()->route('questions.index', $exam_id)
                         ->with('success', '✅ Soal berhasil diperbarui!');
    }

    // 🔹 Hapus soal
    public function destroy($exam_id, Question $question)
    {
        $question->delete();
        return back()->with('success', '🗑️ Soal berhasil dihapus!');
    }
}
