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

Route::get('listings', [ListingController::class, 'index']);
Route::get('listings/show', [ListingController::class, 'show']);
Route::get('listings/saved', [ListingController::class, 'saved']);
Route::get('listings/create', [ListingController::class, 'create']);
Route::get('listings/edit', [ListingController::class, 'edit']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
