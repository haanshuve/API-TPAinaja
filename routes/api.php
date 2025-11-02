<?php

use App\Http\Controllers\QuestionController;

Route::get('/exams/{exam_id}/questions', [QuestionController::class, 'index']);
