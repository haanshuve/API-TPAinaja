<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilTesTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel hasil_tes.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_tes', function (Blueprint $table) {
            $table->id(); // ID otomatis
            $table->unsignedBigInteger('user_id'); // Kolom untuk ID pengguna yang mengikuti tes
            $table->unsignedBigInteger('exam_id'); // Kolom untuk ID ujian yang dikerjakan
            $table->integer('score'); // Skor hasil tes
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisikan relasi foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });
    }

    /**
     * Hapus tabel hasil_tes.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_tes');
    }
}
