<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Menampilkan daftar soal untuk ujian tertentu
     * Bisa digunakan untuk API (Flutter) maupun web.
     */
    public function index(Request $request, $exam_id)
    {
        $exam = Exam::findOrFail($exam_id); // Fetch exam or return 404 if not found
        $questions = $exam->questions ?? []; // Get the related questions for this exam

        // If the request is from API (Accept: application/json)
        if ($request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Daftar soal berhasil diambil',
                'exam_id' => $exam->id,
                'data' => $questions
            ]);
        }

        // If the request is from web (Blade)
        return view('admin.questions.index', compact('exam', 'questions'));
    }

    /**
     * Form tambah soal untuk ujian tertentu (web only)
     */
    public function create($exam_id)
    {
        $exam = Exam::findOrFail($exam_id); // Fetch the exam or return 404
        return view('admin.questions.create', compact('exam'));
    }

    /**
     * Simpan soal baru
     * Bisa digunakan untuk API maupun web.
     */
    public function store(Request $request, $exam_id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'option_1' => 'required|string|max:255',
            'option_2' => 'required|string|max:255',
            'option_3' => 'required|string|max:255',
            'option_4' => 'required|string|max:255',
            'correct_answer' => 'required|in:option_1,option_2,option_3,option_4', // Ensure the correct_answer is one of the options
        ]);

        // Find the exam by ID
        $exam = Exam::findOrFail($exam_id);

        // Create the question associated with the exam
        $question = $exam->questions()->create([
            'question_text' => $validated['question'],
            'option_a' => $validated['option_1'],
            'option_b' => $validated['option_2'],
            'option_c' => $validated['option_3'],
            'option_d' => $validated['option_4'],
            'correct_answer' => $validated['correct_answer'],
        ]);

        // If the request is from API
        if ($request->wantsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Soal berhasil ditambahkan',
                'data' => $question
            ], 201);
        }

        // If the request is from web
        return redirect()->route('admin.questions.index', $exam_id)
                         ->with('success', 'Soal berhasil ditambahkan!');
    }

    public function edit($exam_id, $id)
    {
        $exam = Exam::findOrFail($exam_id);
        $question = Question::findOrFail($id);
        return view('admin.questions.edit', compact('exam', 'question'));
    }
}
