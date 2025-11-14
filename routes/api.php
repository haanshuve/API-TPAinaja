<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Admin\QuestionController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
});

Route::get('/exams/{exam_id}/questions', [QuestionController::class, 'index']);
Route::get('/exams/{exam_id}/questions/{question_id}', [QuestionController::class, 'show']);