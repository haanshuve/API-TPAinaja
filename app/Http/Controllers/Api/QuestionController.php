<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
   public function index($exam_id)
{
    try {
        $exam = \App\Models\Exam::findOrFail($exam_id);
        $questions = Question::where('exam_id', $exam_id)->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'exam' => [
                    'id' => $exam->id,
                    'duration' => $exam->duration, // Gunakan kolom 'duration'
                ],
                'questions' => $questions,
            ],
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error'], 500);
    }
}

    public function show($exam_id, $question_id)
    {
        try {
            Log::debug("Fetching question $question_id for exam $exam_id");

            // Ambil soal berdasarkan exam_id dan question_id
            $question = Question::where('exam_id', $exam_id)->findOrFail($question_id);

            Log::debug("Fetched question: " . $question->toJson());

            return response()->json([
                'status' => 'success',
                'data' => $question,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error("Question not found for $exam_id and $question_id");
            return response()->json(['message' => 'Question not found'], 404);
        } catch (\Exception $e) {
            Log::error("Error fetching question $question_id for exam $exam_id: " . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching the question'], 500);
        }
    }
}
