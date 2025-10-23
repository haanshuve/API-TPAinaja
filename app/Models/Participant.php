<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // jika peserta butuh auth
use Illuminate\Notifications\Notifiable;

class Participant extends Authenticatable
{
    use HasFactory, Notifiable;

    // kolom yang boleh diisi mass-assignment (penting!)
    protected $fillable = [
        'name',
        'email',
        'password',
        // tambahkan kolom lain jika ada: 'address', 'phone', dsb
    ];

    // jangan tampilkan password ketika model di-serialize
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
