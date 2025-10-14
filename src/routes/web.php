<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

// ログイン必須ルート群
Route::middleware('auth')->group(function () {
    Route::get('/taskboard', [TaskController::class, 'index'])->name('taskboard');
    Route::post('/taskboard', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/taskboard/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

// ログイン・登録フォーム
Route::get('/top', function() {
    return view('top');
});
Route::get('/login', function() {
    return view('login');
})->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/register', function() {
    return view('register');
});
Route::post('/register', [UserController::class, 'register']);


// ログアウト
Route::post('/logout', function() {
    Auth::logout();
    return redirect('/login');
})->name('logout');
