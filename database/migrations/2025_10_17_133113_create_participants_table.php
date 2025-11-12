<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();  // ID utama untuk tabel participants
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan tabel users
            $table->integer('total_score')->default(0);  // Nilai total ujian
            $table->text('exam_taken')->nullable();  // Riwayat ujian yang sudah diambil
            $table->enum('status', ['lulus', 'gagal'])->default('gagal');  // Status peserta
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
