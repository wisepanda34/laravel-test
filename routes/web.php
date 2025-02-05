<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;

Route::get('/',  [HomeController::class, 'index'])->name('home.index');
Route::get('/about',  [AboutController::class, 'index'])->name('about.index');

Route::group(['namespace' => 'App\Http\Controllers\Team'], function () {
  Route::get('/teams', 'IndexController')->name('teams.index');
  Route::get('/teams/create', 'CreateController')->name('teams.create');
  Route::post('/teams', 'StoreController')->name('teams.store');
  Route::get('/teams/{team}', 'ShowController')->name('teams.show');
  Route::get('/teams/{team}/edit', 'EditController')->name('teams.edit');
  Route::patch('/teams/{team}', 'UpdateController')->name('teams.update');
  Route::delete('/teams/{team}', 'DestroyController')->name('teams.delete');
});

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

Route::get('/laptops/trashed', [LaptopController::class, 'trashed'])->name('laptops.trashed');
Route::get('/laptops',  [LaptopController::class, 'index'])->name('laptops.index');
Route::get('/laptops/create',  [LaptopController::class, 'create'])->name('laptops.create');
Route::post('/laptops',  [LaptopController::class, 'store'])->name('laptops.store');
Route::get('/laptops/{laptop}',  [LaptopController::class, 'show'])->name('laptops.show');
Route::get('/laptops/{laptop}/edit',  [LaptopController::class, 'edit'])->name('laptops.edit');
Route::patch('/laptops/{laptop}',  [LaptopController::class, 'update'])->name('laptops.update');
Route::delete('/laptops/{laptop}',  [LaptopController::class, 'destroy'])->name('laptops.delete');
Route::patch('/laptops/{id}/restore', [LaptopController::class, 'restore'])->name('laptops.restore');
