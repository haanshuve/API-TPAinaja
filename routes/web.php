<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| Web Routes - TPAinaja Admin Panel
|--------------------------------------------------------------------------
| Struktur akhir yang stabil dan bebas duplikasi.
| Semua route sudah terkelompok dan tidak akan bentrok antar controller.
|--------------------------------------------------------------------------
*/

//
// 🏠 1️⃣ Landing Page (Public)
//
Route::get('/', function () {
    return view('landing');
})->name('home');

//
// 🔐 2️⃣ Authentication (Login & Logout)
//
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login'); // Form login
    Route::post('/login', 'login')->name('login.post');   // Proses login
    Route::get('/logout', 'logout')->name('logout');      // Logout
});

//
// 💼 3️⃣ Admin Panel (Protected by Auth Middleware)
//
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Exam CRUD
    Route::resource('exam', ExamController::class)->except(['show']);

    // Question CRUD per Exam
    Route::prefix('exam/{exam_id}')->group(function () {
        Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
        Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
        Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    });

    // Participants CRUD
    Route::resource('participants', ParticipantController::class)->except(['show']);

    // Staff
    Route::resource('staff', StaffController::class)->only(['index', 'create']);

    // Reports
    Route::resource('reports', ReportController::class)->only(['index', 'create']);



Route::get('/exam/{id}/questions', [ExamController::class, 'questions'])->name('exam.questions');


// profile
    Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
});

