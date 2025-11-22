<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;

class ExamController extends Controller
{
    // TPA
    public function getTpaExams()
    {
        $exams = Exam::where('exam_type', 'tpa')->get();

        return response()->json(
            $exams->map(function ($e) {
                return [
                    'id' => $e->id,
                    'title' => $e->nama_ujian,
                    'question_count' => $e->question_count,
                    'weight' => $e->weight,
                    'duration' => $e->duration,
                    'logo' => asset($e->logo),
                ];
            })
        );
    }

    // CBT
    public function getCbtExams()
    {
        $exams = Exam::where('exam_type', 'cbt')->get();

        return response()->json(
            $exams->map(function ($e) {
                return [
                    'id' => $e->id,
                    'title' => $e->nama_ujian,
                    'question_count' => $e->question_count,
                    'weight' => $e->weight,
                    'duration' => $e->duration,
                    'logo' => asset($e->logo),
                ];
            })
        );
    }
}
