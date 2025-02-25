<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Layout');
});

// Student
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}/update', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}/destroy', [StudentController::class, 'destroy'])->name('student.destroy');

// Course
Route::get('/course', [CourseController::class, 'index'])->name('course.index');
Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
Route::post('/course', [CourseController::class, 'store'])->name('course.store');
Route::get('/course/{course}/edit', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/course/{course}/update', [CourseController::class, 'update'])->name('course.update');
Route::delete('/course/{course}/destroy', [CourseController::class, 'destroy'])->name('course.destroy');


// Exam Marks
Route::get('/examination', [ExamController::class, 'index'])->name('examination.index');
Route::get('/examination/create', [ExamController::class, 'create'])->name('examination.create');
Route::get('/examination/generateReport', [ExamController::class, 'generateReport'])->name('examination.generateReport');
Route::post('/examination', [ExamController::class, 'store'])->name('examination.store');
Route::get('/examination/{examination}/edit', [ExamController::class, 'edit'])->name('examination.edit');
Route::put('/examination/{examination}/update', [ExamController::class, 'update'])->name('examination.update');
Route::delete('/examination/{examination}/destroy', [ExamController::class, 'destroy'])->name('examination.destroy');
