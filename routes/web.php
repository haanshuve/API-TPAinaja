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
use App\Http\Controllers\staff\ExamController as StaffExamController;
use App\Http\Controllers\ProfileController;


// Public Landing Page

Route::get('/', function () {
    return view('welcome');
})->name('home');



Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->middleware('throttle:5,10')->name('auth.login');
    Route::post('/login', 'login')->name('auth.login.post');
    Route::post('/logout', 'logout')->name('auth.logout');
    Route::get('password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [AuthController::class, 'reset'])->name('password.update');
});



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Modal Profile
    Route::get('/profile-modal', fn() => view('modal.modalprofile'))->name('modal.profile');

    // Staff Management
    Route::prefix('staff')->name('staff.')->group(function () {

    Route::get('/', [StaffController::class, 'index'])->name('index');
    Route::get('/create', [StaffController::class, 'create'])->name('create');
    Route::post('/', [StaffController::class, 'store'])->name('store');

    Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('edit');
    Route::put('/{id}', [StaffController::class, 'update'])->name('update');
    Route::delete('/{id}', [StaffController::class, 'destroy'])->name('destroy');

});

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


Route::prefix('staff')->name('staff.')->middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   // Exam CRUD
    Route::prefix('exam')->name('exam.')->group(function () {
        Route::get('/', [StaffExamController::class, 'index'])->name('index');
        Route::get('/create', [StaffExamController::class, 'create'])->name('create');
        Route::post('/', [StaffExamController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [StaffExamController::class, 'edit'])->name('edit');
        Route::put('/{id}', [StaffExamController::class, 'update'])->name('update');

        Route::delete('/{id}', [StaffExamController::class, 'destroy'])->name('destroy');
    });

    // Questions
    Route::prefix('questions')->name('questions.')->group(function () {
        Route::get('/{exam_id}', [StaffQuestionController::class, 'index'])->name('index');
        Route::get('/{exam_id}/create', [StaffQuestionController::class, 'create'])->name('create');
        Route::post('/{exam_id}', [StaffQuestionController::class, 'store'])->name('store');
    });
    // Reports
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

