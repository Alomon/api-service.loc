<?php

use Illuminate\Support\Facades\Route;


Route::resource('/category', \App\Http\Controllers\Api\CategoryController::class);


Route::get('/', function () {
    return view('welcome');
});
