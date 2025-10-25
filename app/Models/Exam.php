<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'nama_ujian',
        'jumlah_soal',
        'bobot_nilai',
        'waktu_ujian',
        'logo',
    ];
}
