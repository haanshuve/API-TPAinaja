<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes - TPAinaja Admin Panel
|--------------------------------------------------------------------------
| Versi final dan rapi. Semua route dibagi per bagian:
| 1. Landing page (home)
| 2. Auth (login, logout)
| 3. Dashboard (untuk user login)
| 4. Exam dan Question CRUD
|--------------------------------------------------------------------------
*/

//
// 🏠 1️⃣ Landing Page
//
Route::get('/', function () {
    return view('landing');
})->name('home');

//
// 🔐 2️⃣ Autentikasi
//
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/logout', 'logout')->name('logout');
});

//
// 💼 3️⃣ Dashboard (hanya user login)
//
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::resource('exam', ExamController::class)->except(['show']);
});


//
// 🧠 4️⃣ Exam & Question Management (CRUD)
//
Route::middleware('auth')->group(function () {
    // CRUD untuk ujian
    Route::resource('exam', ExamController::class);

    // CRUD untuk soal berdasarkan exam_id
    Route::prefix('exam/{exam_id}')->group(function () {
        Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
        Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
        Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    });
});

//
// ⚙️ 5️⃣ Redirect lama (opsional, supaya link lama tidak error)
//


