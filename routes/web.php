<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPageController;

Route::get('/', function () {
    return 'aaaaaa';
});

Route::get('/my_page',  [MyPageController::class, 'index']);
