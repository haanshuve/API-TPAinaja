<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    // Nama tabel (opsional, bisa dihapus kalau sama dengan nama model jamak)
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


    /**
     * Relasi: Satu ujian memiliki banyak soal
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }
}
