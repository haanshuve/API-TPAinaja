<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question; // ✅ tambahkan ini!

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

     protected $fillable = [
    'nama_ujian',
    'question_count',
    'weight',
    'duration',
    'exam_type',
    'exam_date',
    'logo'
];


    // ✅ fungsi relasi wajib ada dan persis seperti ini
    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }

     public function hasilTes()
    {
        return $this->hasMany(HasilTes::class);
    }
}
