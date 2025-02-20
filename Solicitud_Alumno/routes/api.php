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


Route::middleware(['auth:sanctum', \App\Http\Middleware\TeacherMiddleware::class])->group(function () {
    Route::resource('company', ApiCompanyController::class);
});
Route::middleware(['auth:sanctum', \App\Http\Middleware\TeacherMiddleware::class])->group(function () {
    Route::post('/requests', [ApiRequestController::class, 'store']);
    Route::get('/requests/{id}', [ApiRequestController::class, 'show']);
    Route::get('/students/{studentId}/requests', [ApiRequestController::class, 'studentRequests']);

    Route::resource('student', ApiStudentController::class);
});