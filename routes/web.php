<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;

Route::get('/',  [CoursesController::class, 'index'])->name('courses.index');
Route::get('/count/{id}', [CoursesController::class, 'count'])->name('courses.count');
Route::get('/show/{id}', [CoursesController::class, 'show'])->name('courses.show');

Route::get('/history', [CoursesController::class, 'history']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
