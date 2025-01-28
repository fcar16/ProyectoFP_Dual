<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/edit/{student}', [StudentController::class, 'show'])->name('student.show');
Route::put('/note/update/{note}', [StudentController::class, 'update'])->name('note.update');  
Route::get('/note/show/{note}', [StudentController::class, 'show'])->name('note.show');
Route::delete('/note/destroy/{note}', [StudentController::class, 'destroy'])->name('note.destroy');
Route::resource('student', StudentController::class);