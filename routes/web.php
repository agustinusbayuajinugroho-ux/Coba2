<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/book-types',[BookTypeController::class, 'index']);

Route::resource('book-types',BookTypeController::class);

Route::resource('books', BookController::class);
// Route::get('/books', [BookController::class, 'index']);