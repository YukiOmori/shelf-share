<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Book;
use Illuminate\Http\Request;

Route::get('/', 'BooksController@showBooksTable');

Route::post('/books', 'BooksController@store');

Route::post('/booksedit/{books}','BooksController@showBookData');

Route::post('/books/update', 'BooksController@update');

Route::delete('/book/{book}', 'BooksController@delete');