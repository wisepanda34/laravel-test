<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;

Route::get('/',  [HomeController::class, 'index'])->name('home.index');
Route::get('/contacts',  [ContactsController::class, 'index'])->name('contact.index');
Route::get('/about',  [AboutController::class, 'index'])->name('about.index');

Route::get('/posts',  [PostController::class, 'index'])->name('post.index');
Route::get('/posts/create',  [PostController::class, 'create'])->name('post.create');
Route::post('/posts',  [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}',  [PostController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit',  [PostController::class, 'edit'])->name('post.edit');
Route::patch('/posts/{post}',  [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}',  [PostController::class, 'destroy'])->name('post.delete');

Route::get('/cars',  [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/deleted_cars',  [CarController::class, 'deleted_cars'])->name('cars.deleted_cars');
Route::get('/cars/create',  [CarController::class, 'create'])->name('cars.create');
Route::post('/cars',  [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{car}',  [CarController::class, 'show'])->name('cars.show');
Route::get('/cars/{car}/edit',  [CarController::class, 'edit'])->name('cars.edit');
Route::patch('/cars/{car}',  [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{car}',  [CarController::class, 'destroy'])->name('cars.delete');




// Route::get('/posts/update',  [PostController::class, 'update']);
// Route::get('/posts/delete',  [PostController::class, 'delete']);
// Route::get('/posts/first_or_create',  [PostController::class, 'firstOrCreate']);
// Route::get('/posts/update_or_create',  [PostController::class, 'updateOrCreate']);

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
