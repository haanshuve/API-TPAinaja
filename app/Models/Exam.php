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
        'nama_ujian',           // corresponds to 'nama_ujian'
        'question_count', // corresponds to 'jumlah_soal'
        'weight',         // corresponds to 'bobot_nilai'
        'duration',       // corresponds to 'waktu_ujian'
        'logo',           // added field for the logo
    ];

    /**
     * Relasi: Satu ujian memiliki banyak soal
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }
}
