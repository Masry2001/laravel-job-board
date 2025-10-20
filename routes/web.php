<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;

Route::get('/', [IndexController::class, 'index']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/contact', [IndexController::class, 'contact']);

Route::get('/jobs', [JobController::class, 'index']);

Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/create', [PostController::class, 'create']);
Route::get('/blog/{id}', [PostController::class, 'show']);


Route::get('/comments', [CommentController::class, 'index']);
Route::get('/comments/create', [CommentController::class, 'create']);
Route::get('/comments/{id}', [CommentController::class, 'show']);
Route::get('/blog/delete/{id}', [PostController::class, 'delete']);


Route::get('/tags', [App\Http\Controllers\TagController::class, 'index']);
Route::get('/tags/{id}', [App\Http\Controllers\TagController::class, 'show']);
Route::get('/tags/create', [TagController::class, 'create']);

Route::get('/tags/test-many', [TagController::class, 'testManyToMany']);