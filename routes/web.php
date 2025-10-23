<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\PostController;
use App\Http\Controllers\web\IndexController;
use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\CommentController;
use App\Http\Controllers\web\TagController;

//Basically, Postman helps you test your server endpoints without building a frontend.


Route::get('/', IndexController::class);
Route::get('/about', AboutController::class);
Route::get('/contact', ContactController::class);


// Blog Routes
// Route::controller(PostController::class)->group(function () {
//   Route::get('/blog', 'index')->name('blog.index');
//   Route::get('/blog/create', 'create')->name('blog.create');
//   Route::post('/blog', 'store')->name('blog.store');
//   Route::get('/blog/{post}', 'show')->name('blog.show');
//   Route::get('/blog/{post}/edit', 'edit')->name('blog.edit');
//   Route::put('/blog/{post}', 'update')->name('blog.update');
//   Route::delete('/blog/{post}', 'destroy')->name('blog.destroy');
// });
Route::resource('blog', PostController::class)->parameters(['blog' => 'post']);
// this will make the route model binding use 'post' instead of 'blog' for the {post} parameter
// /blog/{post} instead of /blog/{blog}


// Comment Routes
// Route::controller(CommentController::class)->group(function () {
//   Route::get('/comments', 'index')->name('comments.index');
//   Route::get('/comments/create', 'create')->name('comments.create');
//   Route::post('/comments', 'store')->name('comments.store');
//   Route::get('/comments/{comment}', 'show')->name('comments.show');
//   Route::get('/comments/{comment}/edit', 'edit')->name('comments.edit');
//   Route::put('/comments/{comment}', 'update')->name('comments.update');
//   Route::delete('/comments/{comment}', 'destroy')->name('comments.destroy');
// });
Route::resource('comments', CommentController::class);


// Tag Routes
// Route::controller(TagController::class)->group(function () {
//   // Custom route (not part of CRUD)
//   Route::get('/tags/test-many', 'testManyToMany');

//   Route::get('/tags', 'index')->name('tags.index');
//   Route::get('/tags/create', 'create')->name('tags.create');
//   Route::post('/tags', 'store')->name('tags.store');
//   Route::get('/tags/{tag}', 'show')->name('tags.show');
//   Route::get('/tags/{tag}/edit', 'edit')->name('tags.edit');
//   Route::put('/tags/{tag}', 'update')->name('tags.update');
//   Route::delete('/tags/{tag}', 'destroy')->name('tags.destroy');


// });
Route::resource('tags', TagController::class);
