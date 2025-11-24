<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\ExamController;
use App\Http\Controllers\HasilTesController;



Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
});

Route::get('/exams/{exam_id}/questions', [QuestionController::class, 'index']);
Route::get('/exams/{exam_id}/questions/{question_id}', [QuestionController::class, 'show']);

Route::get('/exams', [ExamController::class, 'index']);


Route::get('/tpa', [ExamController::class, 'getTpaExams']);
Route::get('/cbt', [ExamController::class, 'getCbtExams']);

Route::middleware('auth:sanctum')->get('/riwayat', [ExamController::class, 'riwayatUjian']);