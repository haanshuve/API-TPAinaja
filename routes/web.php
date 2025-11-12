<?php

use Illuminate\Support\Facades\Route;

// ========== CONTROLLERS ==========
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\staff\DashboardController;
use App\Http\Controllers\staff\QuestionController as StaffQuestionController;

use App\Http\Controllers\ProfileController;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StaffMiddleware;

// =======================
// Public Landing Page
// =======================
Route::get('/', function () {
    return view('welcome');
})->name('home');


// =======================
// ADMIN ROUTES
// =======================
Route::prefix('admin')->name('admin.')->group(function () {

    // ---------- AUTH ----------
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.post');
        Route::post('/logout', 'logout')->name('logout');
    });

    // ---------- PROTECTED ----------
    Route::middleware(['auth', 'admin'])->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'admin.dashboard'])->name('dashboard');

        // Modal Profile
        Route::get('/profile-modal', fn() => view('modal.modalprofile'))->name('modal.profile');

        // Staff Management
        Route::resource('staff', StaffController::class)->only(['index', 'create']);

        // Exam
        Route::resource('exam', ExamController::class)->except(['show']);
        Route::get('/exam/{id}/questions', [ExamController::class, 'questions'])->name('exam.questions');

        // Questions (nested)
        Route::prefix('exam/{exam_id}')->group(function () {
            Route::resource('questions', QuestionController::class)->except(['show']);
        });

        // Participants
        Route::resource('participants', ParticipantController::class)->except(['show']);

        // Reports
        Route::resource('reports', ReportController::class)->only(['index', 'create']);

        // Profile
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});


// =======================
// STAFF ROUTES
// =======================
Route::prefix('staff')->name('staff.')->group(function () {

    // ---------- AUTH ----------
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login.post');
        Route::post('/logout', 'logout')->name('logout');
    });

    // ---------- PROTECTED ----------
    Route::middleware(['auth', 'staff'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    });

    Route::get('/questions', [StaffQuestionController::class, 'index'])->name('questions.index');
});
