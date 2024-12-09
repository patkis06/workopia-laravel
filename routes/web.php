<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeocodeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::get('jobs/saved', [JobController::class, 'saved'])->name('jobs.saved');
    Route::get('jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

    Route::post('jobs', [JobController::class, 'store'])->name('jobs.store');
    Route::post('jobs/search', [JobController::class, 'search'])->name('jobs.search');

    Route::put('jobs/{job}/update', [JobController::class, 'update'])->name('jobs.update');
    Route::put('users/{user}/update', [UserController::class, 'update'])->name('users.update');

    Route::delete('jobs/{job}/delete', [JobController::class, 'destroy'])->name('jobs.destroy');

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('jobs/{job}/bookmark', [JobController::class, 'bookmarkJob'])->name('jobs.bookmark');
    Route::delete('jobs/{job}/bookmark', [JobController::class, 'unBookmarkJob'])->name('jobs.bookmark.delete');

    Route::get('/jobs/{job}/apply', [ApplicantController::class, 'index'])->name('applicant.index');
    Route::post('/jobs/{job}/apply', [ApplicantController::class, 'store'])->name('applicant.store');
    Route::delete('/jobs/{applicant}/destoy', [ApplicantController::class, 'destroy'])->name('applicant.destroy');
});

Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/geocode', [GeocodeController::class, 'geocode']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/login', [AuthController::class, 'authozize'])->name('authozize');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
});
