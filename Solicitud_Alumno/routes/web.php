<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;




Route::get('/', [StudentController::class, 'index'])->name('student.index');

//Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');

//Route::post('/student', [StudentController::class, 'store'])->name('student.store');

//Route::get('/student/edit/{student}', [StudentController::class, 'show'])->name('student.show');

//Route::put('/student/update/{student}', [StudentController::class, 'update'])->name('student.update');

//Route::get('/student/show/{student}', [StudentController::class, 'show'])->name('student.show');

//Route::delete('/student/destroy/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::resource('student', StudentController::class);