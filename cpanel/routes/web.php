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
Route::middleware('auth')->get('/', function () {
    return redirect()->to('/admin');
});
Route::middleware(['auth', 'role'])->group(function () {

    Route::prefix('admin/')->group(function () {
        Route::get('/', Admin\HomeController::class)->name('admin.homepage');
        Route::get('home', Admin\HomeController::class)->name('admin.home');
        Route::get('dashboard', Admin\HomeController::class)->name('admin.dashboard');
        Route::get('student/{grade}/grade', [App\Http\Controllers\Admin\StudentController::class, 'byGrade'])->name('admin.grade.student');
        Route::get('teacher/{grade}/grade', [App\Http\Controllers\Admin\TeacherController::class, 'byGrade'])->name('admin.grade.teacher');
        Route::get('answer/{homework}/homework', [App\Http\Controllers\Admin\AnswerController::class, 'byHomework'])->name('admin.homework.answer');
        Route::get('homework/{grade}/grade', [App\Http\Controllers\Admin\HomeworkController::class, 'byGrade'])->name('admin.grade.homework');
        Route::resource('student', Admin\StudentController::class, ['as' => 'admin']);
        Route::resource('teacher', Admin\TeacherController::class, ['as' => 'admin']);
        Route::resource('grade', Admin\GradeController::class, ['as' => 'admin']);
        Route::resource('answer', Admin\AnswerController::class, ['as' => 'admin'])->except(['edit', 'update', 'index']);
        Route::resource('homework', Admin\HomeworkController::class, ['as' => 'admin'])->except(['update', 'edit']);
        Route::resource('admin', Admin\AdminController::class, ['as' => 'admin'])->except(['update', 'edit', 'show']);
        Route::resource('activity', Admin\ActivityController::class, ['as' => 'admin'])->except(['update', 'edit', 'show']);
        Route::resource('schedual', Admin\SchedualController::class, ['as' => 'admin'])->except(['update', 'edit', 'show']);
        Route::resource('rate', Admin\RateController::class, ['as' => 'admin'])->only(['index', 'destroy']);
    });
});

Route::middleware(['auth', 'role'])->group(function () {
    Route::prefix('teacher/')->group(function () {
        Route::get('/', Teacher\HomeController::class)->name('teacher.homepage');
        Route::get('home', Teacher\HomeController::class)->name('teacher.home');
        Route::get('dashboard', Teacher\HomeController::class)->name('teacher.dashboard');
        Route::get('student/{grade}/grade', [App\Http\Controllers\Teacher\StudentController::class, 'byGrade'])->name('teacher.grade.student');
        Route::get('answer/{homework}/homework', [App\Http\Controllers\Teacher\AnswerController::class, 'byHomework'])->name('teacher.homework.answer');
        Route::get('homework/{grade}/grade', [App\Http\Controllers\Teacher\HomeworkController::class, 'byGrade'])->name('teacher.grade.homework');
        Route::resource('student', Teacher\StudentController::class, ['as' => 'teacher']);
        Route::resource('answer', Teacher\AnswerController::class, ['as' => 'teacher'])->except(['edit', 'update', 'index']);
        Route::resource('homework', Teacher\HomeworkController::class, ['as' => 'teacher'])->except(['update', 'edit']);
        Route::resource('activity', Teacher\ActivityController::class, ['as' => 'teacher'])->except(['update', 'edit', 'show']);
        Route::resource('schedual', Teacher\SchedualController::class, ['as' => 'teacher'])->except(['update', 'edit', 'show']);
        Route::resource('rate', Teacher\RateController::class, ['as' => 'teacher'])->except(['update', 'edit']);
    });
});
