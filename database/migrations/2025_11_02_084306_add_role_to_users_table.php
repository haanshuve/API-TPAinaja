<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk menambahkan kolom 'role' di tabel users
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan kolom role (admin, staff, participant)
            $table->enum('role', ['admin', 'staff', 'participant'])->default('participant')->after('password');
        });
    }

    /**
     * Balikkan migrasi (hapus kolom 'role' jika di-rollback)
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
