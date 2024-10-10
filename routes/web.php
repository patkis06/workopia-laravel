<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::resource('/jobs', JobController::class);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
