<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTes extends Model
{
    use HasFactory;

    protected $table = 'hasil_tes';

    protected $fillable = [
        'user_id',
        'exam_id',
        'score',
    ];

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel Exam
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
