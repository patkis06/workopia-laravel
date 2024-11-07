<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::get('jobs/saved', [JobController::class, 'saved'])->name('jobs.saved');
Route::get('jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

Route::post('jobs', [JobController::class, 'store']);
Route::post('jobs/search', [JobController::class, 'search']);

Route::put('jobs/{job}/update', [JobController::class, 'update']);

Route::delete('jobs/{job}/delete', [JobController::class, 'destroy']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'authozize'])->name('authozize');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
