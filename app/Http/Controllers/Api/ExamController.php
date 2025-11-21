<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
   public function getTpaExams()
{
    // Ambil hanya ujian yang tipe TPA
    $tpaExams = Exam::where('exam_type', 'TPA')->get();

    // Menyesuaikan nama field agar sesuai dengan yang diharapkan Flutter
    $formattedExams = $tpaExams->map(function ($exam) {
        return [
            'id' => $exam->id,
            'title' => $exam->nama_ujian,  // Mengubah 'nama_ujian' menjadi 'title'
            'question_count' => $exam->question_count,
            'weight' => $exam->weight,
            'duration' => $exam->duration,
            'exam_type' => $exam->exam_type,
            'logo' => $exam->logo,
        ];
    });

    return response()->json($formattedExams);
}

}
