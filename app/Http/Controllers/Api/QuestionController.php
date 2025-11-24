<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index($exam_id)
{
    // Ambil soal untuk ujian tertentu
    $questions = Question::where('exam_id', $exam_id)->get();
    return response()->json($questions);
}

public function show($exam_id, $question_id)
{
    // Ambil soal berdasarkan ID
    $question = Question::where('exam_id', $exam_id)->findOrFail($question_id);
    return response()->json($question);
}
}
