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
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

// =======================
// Public Landing Page
// =======================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// =======================
// AUTHENTICATION ROUTES
// =======================
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('auth.login');
    Route::post('/login', 'login')->name('auth.login.post');
    Route::post('/logout', 'logout')->name('auth.logout');
    /* Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update'); */
});

// =======================
// ADMIN ROUTES
// =======================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Modal Profile
    Route::get('/profile-modal', fn() => view('modal.modalprofile'))->name('modal.profile');

    // Staff Management
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::resource('staff', StaffController::class)->only(['index', 'create', 'store']);
    Route::post('/staff/edit', [StaffController::class, 'edit'])->name('staff.edit');

    // Exam Management
    Route::resource('exam', ExamController::class)->except(['show']);
    Route::get('/exam/{id}/questions', [ExamController::class, 'questions'])->name('exam.questions');

    // Questions (nested under exam)
    Route::prefix('exam/{exam_id}')->group(function () {
        Route::resource('questions', QuestionController::class)->except(['show']);
    });

    // Participants Management
    Route::resource('participants', ParticipantController::class)->except(['show']);
    Route::post('/participants/create', [ParticipantController::class, 'create'])->name('participants.create');

    // Reports
    Route::resource('reports', ReportController::class)->only(['index', 'create']);

    // Profile Management
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// =======================
// STAFF ROUTES
// =======================
Route::prefix('staff')->name('staff.')->middleware('auth')->group(function () {

    // Staff Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');

    // Staff Questions
    Route::get('/questions', [StaffQuestionController::class, 'index'])->name('questions.index');

});
