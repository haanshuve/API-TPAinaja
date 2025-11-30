<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOptionsTable extends Migration
{
    public function up()
    {
        Schema::table('options', function (Blueprint $table) {
            // Menambahkan kolom yang diperlukan
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->enum('value', ['A', 'B', 'C', 'D'])->index();
            $table->text('text'); // Teks dari pilihan
        });
    }

    public function down()
    {
        Schema::table('options', function (Blueprint $table) {
            // Menghapus kolom yang ditambahkan
            $table->dropColumn(['question_id', 'value', 'text']);
        });
    }
}
