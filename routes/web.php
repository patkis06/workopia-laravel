<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('jobs', [JobController::class, 'index']);
Route::get('jobs/{job}', [JobController::class, 'show']);
Route::get('jobs/saved', [JobController::class, 'saved']);
Route::get('jobs/create', [JobController::class, 'create']);
Route::get('jobs/{job}/edit', [JobController::class, 'edit']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
