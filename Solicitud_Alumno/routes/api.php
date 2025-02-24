<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiRequestController;
use App\Http\Controllers\API\ApiCompanyController;
use App\Http\Controllers\API\ApiStudentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Rutas para student


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/student/{id}', [ApiStudentController::class, 'show']);
    Route::get('/student', [ApiStudentController::class, 'index']);
    Route::put('/student/{id}', [ApiStudentController::class, 'update']);
    Route::get('/company/{id}', [ApiCompanyController::class, 'show']);
    Route::get('/company', [ApiCompanyController::class, 'index']);
    Route::get('/student/{studentId}/requests', [ApiRequestController::class, 'studentRequests']);
});




Route::middleware(['auth:sanctum', \App\Http\Middleware\TeacherMiddleware::class])->group(function () {
    Route::post('/student', [ApiStudentController::class, 'store']);
    Route::delete('/student/{id}', [ApiStudentController::class, 'destroy']);
    Route::post('/company', [ApiCompanyController::class, 'store']);
    Route::put('/company/{id}', [ApiCompanyController::class, 'update']);
    Route::delete('/company/{id}', [ApiCompanyController::class, 'destroy']);


});
Route::middleware(['auth:sanctum', \App\Http\Middleware\StudentMiddleware::class])->group(function () {
    Route::post('/requests', [ApiRequestController::class, 'store']);
    Route::get('/requests/{id}', [ApiRequestController::class, 'show']);
    Route::delete('/requests/{id}', [ApiRequestController::class, 'destroy']); // Agregar esta línea



});