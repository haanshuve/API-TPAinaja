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
        'jumlah_soal',
        'bobot_nilai',
        'waktu_ujian',
        'logo',
    ];

    /**
     * Relasi: Satu ujian memiliki banyak soal
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }
}
