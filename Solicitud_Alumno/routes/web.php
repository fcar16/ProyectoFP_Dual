<?php

use App\Http\Controllers\StudentController;
use App\Models\Company;
use App\Models\Student;
use App\Http\Controllers\CompanyController;
use GuzzleHttp\Psr7\Request;
use App\Http\Controllers\RequestController;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;




Route::get('/', [StudentController::class, 'index'])->name('student.index');

//Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');

//Route::post('/student', [StudentController::class, 'store'])->name('student.store');

//Route::get('/student/edit/{student}', [StudentController::class, 'show'])->name('student.show');

//Route::put('/student/update/{student}', [StudentController::class, 'update'])->name('student.update');

//Route::get('/student/show/{student}', [StudentController::class, 'show'])->name('student.show');

//Route::delete('/student/destroy/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::resource('student', StudentController::class);


Route::get('/company', [CompanyController::class, 'index'])->name('company.index');

Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');

Route::post('/company', [CompanyController::class, 'store'])->name('company.store');

Route::get('/company/{company}', [CompanyController::class, 'show'])->name('company.show');

Route::get('/company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');

Route::put('/company/{company}', [CompanyController::class, 'update'])->name('company.update');

Route::delete('/company/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');


Route::get('/request/create', [RequestController::class, 'create'])->name('request.create');
Route::post('/request', [RequestController::class, 'store'])->name('request.store');
Route::get('/request/{id}', [RequestController::class, 'show'])->name('request.show');
Route::get('/student/{student}/requests', [RequestController::class, 'studentRequests'])->name('request.studentRequests');


Route::resource('teachers', TeacherController::class);

Route::middleware(['auth', 'profesor'])->group(function () {
    Route::resource('teachers', TeacherController::class);

});
