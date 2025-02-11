<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoiceUploadController;
use App\Http\Controllers\WechatController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/voiceUpload', [VoiceUploadController::class, 'createForm']);
Route::post('/voiceUpload', [VoiceUploadController::class, 'voiceUpload'])->name('voiceUpload');

Route::get('/getVoices', [WechatController::class, 'getDatas']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
