<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExamController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// =================== PUBLIC ROUTES (No Auth Required) ===================

// Authentication
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/auth/google', [AuthController::class, 'googleLogin']);

// Public exam listings (if you want them public)
Route::get('/tpa', [ExamController::class, 'index']); // Or create separate TpaController
Route::get('/cbt', [ExamController::class, 'index']); // Or create separate CbtController
Route::get('/exam', [ExamController::class, 'index']);
Route::get('/exam/{id}', [ExamController::class, 'show']);

// =================== PROTECTED ROUTES (Auth Required) ===================

Route::middleware('auth:sanctum')->group(function () {
    
    // Auth endpoints
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    
    // Exam endpoints
    Route::get('/exam/{examId}/questions', [ExamController::class, 'getQuestions']);
    Route::post('/exam/submitResult', [ExamController::class, 'submitResult']);
    
    // Hasil ujian endpoints
    Route::get('/hasil-ujian/{hasilTesId}', [ExamController::class, 'getHasilUjian']);
    Route::get('/user/{userId}/history', [ExamController::class, 'getUserHistory']);
    
});

// Default route for testing
Route::get('/', function () {
    return response()->json([
        'message' => 'TPAinaja API',
        'version' => '1.0.0',
        'status' => 'active',
    ]);
});