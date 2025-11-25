<?php
// app/Models/Question.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'exam_id',
        'question_text',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_option',
    ];

    // Relasi dengan model Exam
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
