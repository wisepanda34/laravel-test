<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;

Route::get('/',  [HomeController::class, 'index'])->name('home.index');
Route::get('/login',  [LoginController::class, 'index'])->name('auth.login');
Route::get('/about',  [AboutController::class, 'index'])->name('about.index');



Route::middleware('admin')->prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
  Route::prefix('posts')->namespace('Post')->group(function () {
    Route::get('/', 'IndexController')->name('admin.posts.index');
    Route::get('/create', 'CreateController')->name('admin.posts.create');
    Route::post('/', 'StoreController')->name('admin.posts.store');
    Route::get('/{post}', 'ShowController')->name('admin.posts.show');
    Route::get('/{post}/edit', 'EditController')->name('admin.posts.edit');
    Route::patch('/{post}', 'UpdateController')->name('admin.posts.update');
    Route::delete('/{post}', 'DestroyController')->name('admin.posts.delete');
  });
});


Route::group(['namespace' => 'App\Http\Controllers\Team'], function () {
  Route::get('/teams', 'IndexController')->name('teams.index');
  Route::get('/teams/create', 'CreateController')->name('teams.create');
  Route::post('/teams', 'StoreController')->name('teams.store');
  Route::get('/teams/{team}', 'ShowController')->name('teams.show');
  Route::get('/teams/{team}/edit', 'EditController')->name('teams.edit');
  Route::patch('/teams/{team}', 'UpdateController')->name('teams.update');
  Route::delete('/teams/{team}', 'DestroyController')->name('teams.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
  Route::get('/posts',  'IndexController')->name('posts.index');
  Route::get('/posts/create', 'CreateController')->name('posts.create');
  Route::post('/posts',  'StoreController')->name('posts.store');
  Route::get('/posts/{post}',  'ShowController')->name('posts.show');
  Route::get('/posts/{post}/edit',  'EditController')->name('posts.edit');
  Route::patch('/posts/{post}',  'UpdateController')->name('posts.update');
  Route::delete('/posts/{post}',  'DestroyController')->name('posts.delete');
});

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

Auth::routes();
