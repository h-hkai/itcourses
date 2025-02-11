<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoiceUploadController;
use App\Http\Controllers\WechatController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
