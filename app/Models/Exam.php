<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    // Field yang boleh diisi lewat form
    protected $fillable = [
        'name',
        'weight',
        'question_count',
        'duration',
    ];

    // Relasi: 1 Ujian punya banyak Soal
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
