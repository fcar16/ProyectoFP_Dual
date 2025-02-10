<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiRequestController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Definimos las rutas para el controlador ApiCompanyController
Route::resource('company', ApiCompanyController::class);

Route::post('/requests', [ApiRequestController::class, 'store']);
Route::get('/requests/{id}', [ApiRequestController::class, 'show']);
Route::get('/students/{studentId}/requests', [ApiRequestController::class, 'studentRequests']);
