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
        'nama_ujian',           // corresponds to 'nama_ujian'
        'question_count', // corresponds to 'jumlah_soal'
        'weight',         // corresponds to 'bobot_nilai'
        'duration',       // corresponds to 'waktu_ujian'
        'logo',           // added field for the logo
    ];

    // ✅ fungsi relasi wajib ada dan persis seperti ini
    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }
}
