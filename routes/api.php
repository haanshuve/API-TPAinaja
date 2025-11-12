<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\Admin\QuestionController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/exams/{exam_id}/questions', [QuestionController::class, 'index']);
