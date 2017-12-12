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

Route::get('/', 'BooksController@index');

Route::post('/books', 'BooksController@store');

Route::post('/booksedit/{books}','BooksController@edit');

Route::post('/books/update', 'BooksController@update');

Route::delete('/book/{book}', 'BooksController@delete');

Auth::routes();

Route::get('/home', 'BooksController@index')->name('home');
Route::get('/books/register', 'BooksController@register');
Route::get('/books/lend', 'BooksController@indexLend');
Route::get('/books/borrow', 'BooksController@indexBorrow');


Route::post('/usersedit/{users}', 'UsersController@edit');

Route::post('/users/update', 'UsersController@update');