<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('jobs', [ListingController::class, 'index']);
Route::get('jobs/show', [ListingController::class, 'show']);
Route::get('jobs/saved', [ListingController::class, 'saved']);
Route::get('jobs/create', [ListingController::class, 'create']);
Route::get('jobs/edit', [ListingController::class, 'edit']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
