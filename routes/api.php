<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AlternativeController;

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

// Rotas para as alternativas
Route::get('/alternatives', [AlternativeController::class, 'index']);
Route::post('/alternatives', [AlternativeController::class, 'save']);
Route::get('/alternatives/{id}', [AlternativeController::class, 'show']);
Route::put('/alternatives/{id}', [AlternativeController::class, 'update']);
Route::delete('/alternatives/{id}', [AlternativeController::class, 'destroy']);

//Rotas para levels
Route::get('/level', [LevelController::class, 'index']);

//Rotas para subjects
Route::get('/subject', [SubjectController::class, 'index']);
