<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\PostController;
use App\Http\Controllers\web\IndexController;
use App\Http\Controllers\web\AboutController;
use App\Http\Controllers\web\ContactController;
use App\Http\Controllers\web\CommentController;
use App\Http\Controllers\web\TagController;
use App\Http\Controllers\ProfileController;
//Basically, Postman helps you test your server endpoints without building a frontend.


Route::get('/', IndexController::class)->name('home');
Route::get('/about', AboutController::class)->name('about');
Route::get('/contact', ContactController::class)->name('contact');


// Blog Routes
Route::middleware(['auth:web', 'verified'])->group(function () {

  // Public blog routes
  Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
  Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');

  // Admin protected routes
  Route::middleware('OnlyAdmins')->group(function () {
    Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
    Route::post('/blog', [PostController::class, 'store'])->name('blog.store');
    Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{post}', [PostController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('blog.destroy');
  });

});


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
Route::resource('comments', CommentController::class)->middleware(['auth', 'verified']);


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
Route::resource('tags', TagController::class)->middleware(['auth', 'verified']);


Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth:web', 'verified'])->name('dashboard');




Route::middleware('auth:web')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';