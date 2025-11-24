<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\HasilTes;
use Illuminate\Http\Request;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function index()
{
    return Exam::all();
}
public function riwayatUjian()
{
    // Cek apakah pengguna sudah terautentikasi
    if (!Auth::check()) { // Gunakan Auth::check() untuk memeriksa autentikasi
        return response()->json([
            'message' => 'Unauthorized'
        ], 401); // Kembalikan status unauthorized jika pengguna tidak terautentikasi
    }

    $userId = Auth::user()->id; // Gunakan Auth::user()->id untuk mendapatkan ID pengguna yang sedang login

    // Ambil riwayat ujian berdasarkan user_id
    $riwayatUjian = HasilTes::with('exam')
        ->where('user_id', $userId)
        ->get();

    if ($riwayatUjian->isEmpty()) {
        return response()->json([
            'message' => 'Tidak ada riwayat ujian.'
        ], 404);
    }

    $riwayatData = $riwayatUjian->map(function ($item) {
        return [
            'img' => $item->exam->logo ?? 'default_image.png',
            'title' => $item->exam->title ?? 'No Title',
            'soal' => $item->exam->questions_count ?? 'No Questions',
            'score' => $item->score,
            'tanggal' => $item->created_at->format('d-m-Y'),
        ];
    });

    return response()->json($riwayatData, 200);
}

}
