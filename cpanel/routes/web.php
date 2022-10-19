<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('student/{grade}/grade', [App\Http\Controllers\StudentController::class, 'byGrade'])->name('grade.student');
    Route::get('teacher/{grade}/grade', [App\Http\Controllers\TeacherController::class, 'byGrade'])->name('grade.teacher');
    Route::get('answer/{homework}/homework', [App\Http\Controllers\AnswerController::class, 'byHomework'])->name('homework.answer');
    Route::resource('student', StudentController::class);
    Route::resource('teacher', TeacherController::class);
    Route::resource('grade', GradeController::class);
    Route::resource('answer', AnswerController::class)->except(['edit', 'update', 'index']);
    Route::resource('homework', HomeworkController::class)->except(['update', 'edit']);
    Route::resource('admin', AdminController::class)->except(['update', 'edit', 'show']);;
    Route::resource('activity', ActivityController::class)->except(['update', 'edit', 'show']);;
    Route::resource('schedual', SchedualController::class)->except(['update', 'edit', 'show']);;
});
