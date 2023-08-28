<?php

use App\Book;
use Illuminate\Http\Request;

Route::get('/', 'BooksController@index');

Route::post('/books','BooksController@store');

Route::post('/booksedit/{books}','BooksController@edit');

Route::post('/books/update','BooksController@update');

Route::delete('/book/{book}','BooksController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
