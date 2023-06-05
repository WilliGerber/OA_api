<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\LearnController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas de autenticação
Route::post('/login', [AuthController::class, 'login']);

// Rotas para as perguntas
Route::get('/questions', [QuestionController::class, 'index']);
Route::post('/questions', [QuestionController::class, 'save']);
Route::get('/questions/{id}', [QuestionController::class, 'show']);
Route::put('/questions/{id}', [QuestionController::class, 'update']);
Route::delete('/questions/{id}', [QuestionController::class, 'destroy']);
Route::get('questions/filter/{subjectId}', [QuestionController::class, 'getQuestionsBySubjectId']);
Route::get('/questions/{questionId}/alternatives', [QuestionController::class, 'getQuestionAlternatives']);


// Rotas para as alternativas
Route::get('/alternatives', [AlternativeController::class, 'index']);
Route::post('/alternatives', [AlternativeController::class, 'save']);
Route::get('/alternatives/{id}', [AlternativeController::class, 'show']);
Route::put('/alternatives/{id}', [AlternativeController::class, 'update']);
Route::delete('/alternatives/{id}', [AlternativeController::class, 'destroy']);

// Rotas para o aprendizado
Route::get('/learn', [LearnController::class, 'index']);
Route::post('/learn', [LearnController::class, 'save']);
Route::get('/learn/{id}', [LearnController::class, 'show']);
Route::put('/learn/{id}', [LearnController::class, 'update']);
Route::delete('/learn/{id}', [LearnController::class, 'destroy']);
Route::get('learn/filter/{subjectId}', [LearnController::class, 'filterBySubjectId']);
Route::get('learnByLevelAndSubject/{levelId}/{subjectId}', [LearnController::class, 'getContentByLevelAndSubject']);

//Rotas para levels
Route::get('/level', [LevelController::class, 'index']);

//Rotas para subjects
Route::get('/subject', [SubjectController::class, 'index']);
