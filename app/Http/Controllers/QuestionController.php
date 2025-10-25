<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Menampilkan daftar soal untuk ujian tertentu
     */
    public function index($exam_id)
    {
        $exam = Exam::findOrFail($exam_id);
        $questions = $exam->questions ?? []; // relasi nanti bisa ditambahkan
        return view('questions.index', compact('exam', 'questions'));
    }

    /**
     * Form tambah soal untuk ujian tertentu
     */
    public function create($exam_id)
    {
        $exam = Exam::findOrFail($exam_id);
        return view('questions.create', compact('exam'));
    }

    /**
     * Simpan soal baru
     */
    public function store(Request $request, $exam_id)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'option_1' => 'required|string',
            'option_2' => 'required|string',
            'option_3' => 'required|string',
            'option_4' => 'required|string',
            'correct_answer' => 'required|string',
        ]);

        $exam = Exam::findOrFail($exam_id);

        $exam->questions()->create($validated);

        return redirect()->route('questions.index', $exam_id)
                         ->with('success', 'Soal berhasil ditambahkan!');
    }
}
