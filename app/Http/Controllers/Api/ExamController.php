<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::select('id', 'title', 'description', 'start_time', 'end_time')
                     ->where('is_active', true)
                     ->get();

        return response()->json([
            'status' => true,
            'message' => 'Daftar ujian aktif berhasil diambil',
            'data' => $exams
        ], 200);
    }

    // GET /api/exams/{id}
    public function show($id)
    {
        $exam = Exam::with('questions:id,exam_id,question_text,option_a,option_b,option_c,option_d,correct_answer')
                    ->find($id);

        if (!$exam) {
            return response()->json([
                'status' => false,
                'message' => 'Ujian tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail ujian berhasil diambil',
            'data' => $exam
        ], 200);
    }
}
