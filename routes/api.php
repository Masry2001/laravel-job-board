<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\version1\PostApiController;
use App\Http\Controllers\api\version1\CommentApiController;
use App\Http\Controllers\api\version1\TagApiController;
use App\Http\Controllers\api\version1\AuthController;

//Basically, Postman helps you test your server endpoints without building a frontend.

Route::prefix('version1')->as('api.')->group(function () {

  // using the as method will me you call the route like this api.posts.index
  // Blog Routes
  Route::controller(PostApiController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index')->middleware('auth:api');
    Route::post('/posts', 'store')->name('posts.store');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::put('/posts/{post}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');
  });



  // Comment Routes
  Route::controller(CommentApiController::class)->group(function () {
    Route::get('/comments', 'index')->name('comments.index');
    Route::post('/comments', 'store')->name('comments.store');
    Route::get('/comments/{comment}', 'show')->name('comments.show');
    Route::put('/comments/{comment}', 'update')->name('comments.update');
    Route::delete('/comments/{comment}', 'destroy')->name('comments.destroy');
  });



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



  // auth routes
  // using the as method will me you call the route like this api.login

  Route::controller(AuthController::class)->group(function () {

    Route::prefix('auth')->group(function () {

      // Public
      Route::post('/login', 'login');

      // Protected
      Route::middleware('auth:api')->group(function () {
        Route::post('/logout', 'logout');
        Route::post('/refresh', 'refresh');
        Route::get('/me', 'me');
      });
      // auth:api middleware does this logic:
      // Look at auth.php and find the api guard
      // See that its driver is jwt
      // Ask the JWT package to validate token
      // If valid → attach user to request (auth()->user())
      // If invalid → return 401 Unauthorized

      //middleware('api') What it does:
      // Makes the request stateless
      // No session, no cookies
      // Applies rate limiting (Throttle)
      // Forces JSON responses
      // note that You DON'T need to manually add middleware('api') if your routes are already in routes/api.php. Laravel automatically applies the api middleware group to all routes in api.php.
    });


  });


});

