<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\version1\PostApiController;
use App\Http\Controllers\api\version1\CommentApiController;
use App\Http\Controllers\api\version1\TagApiController;

//Basically, Postman helps you test your server endpoints without building a frontend.

Route::prefix('version1')->as('api.')->group(function () {
  // Blog Routes
  Route::controller(PostApiController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::post('/posts', 'store')->name('posts.store');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::put('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
  });
  //Route::apiResource('posts', PostApiController::class);


  // Comment Routes
  Route::controller(CommentApiController::class)->group(function () {
    Route::get('/comments', 'index')->name('comments.index');
    Route::post('/comments', 'store')->name('comments.store');
    Route::get('/comments/{comment}', 'show')->name('comments.show');
    Route::put('/comments/{comment}', 'update')->name('comments.update');
    Route::delete('/comments/{comment}', 'destroy')->name('comments.destroy');
  });
  //Route::apiResource('comments', CommentApiController::class);



  // Tag Routes
  Route::controller(TagApiController::class)->group(function () {
    // Custom route (not part of CRUD)
    Route::get('/tags/test-many', 'testManyToMany');
    Route::get('/tags', 'index')->name('tags.index');
    Route::post('/tags', 'store')->name('tags.store');
    Route::get('/tags/{tag}', 'show')->name('tags.show');
    Route::put('/tags/{tag}', 'update')->name('tags.update');
    Route::delete('/tags/{tag}', 'destroy')->name('tags.destroy');
  });
  //Route::apiResource('tags', TagApiController::class);
});

