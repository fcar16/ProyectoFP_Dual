<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiRequestController;





Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/requests', [ApiRequestController::class, 'store']);
Route::get('/requests/{id}', [ApiRequestController::class, 'show']);
Route::get('/students/{studentId}/requests', [ApiRequestController::class, 'studentRequests']);