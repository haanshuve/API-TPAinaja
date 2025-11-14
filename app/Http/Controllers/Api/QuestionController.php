<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // GET /api/exams/{exam_id}/questions
    public function index($exam_id)
    {
        $questions = Question::where('exam_id', $exam_id)
                            ->select('id', 'question_text', 'option_a', 'option_b', 'option_c', 'option_d')
                            ->get();

        if ($questions->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Belum ada soal untuk ujian ini'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Soal ujian berhasil diambil',
            'data' => $questions
        ], 200);
    }
}
