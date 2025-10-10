<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('exams', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama ujian
        $table->integer('weight')->default(100); // Bobot nilai
        $table->integer('question_count')->default(0); // Jumlah soal
        $table->time('duration')->nullable(); // Durasi ujian
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
