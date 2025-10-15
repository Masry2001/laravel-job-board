<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/contact', [IndexController::class, 'contact']);

Route::get('/jobs', [JobController::class, 'index']);
