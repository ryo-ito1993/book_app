<?php

use App\Book;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/books', function (Request $request) {
    //
});

Route::delete('/book/{book}', function (Book $book) {
    //
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
