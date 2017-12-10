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

Route::get('/', function () {
    $books = Book::orderBy('created_at', 'asc')->get();
    return view('books', ['books' => $books]); // 質問：viewの第二引数の役割とここの記述の意味
});


Route::post('/books', function (Request $request) {
    $validator = Validator::make($request->all(), 
                                ['item_name' => 'required | min:1 |max:255'],
                                ['item_number' => 'required | min:1 | max: 3'],
                                ['item_amount' => 'required | min:1 | max: 6'],
                                ['item_author' => 'required | min:1 | max: 64'],
                                ['item_publisher' => 'required | min:1 | max: 64'],
                                ['published' => 'required']);
    
    if ($validator->fails()) {
        return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
    }
    
    $books = new Book;
    
    $books->item_name = $request->item_name;
    $books->item_number = $request->item_number;
    $books->item_amount = $request->item_amount;
    $books->author = $request->author;
    $books->item_publisher = $request->item_publisher;
    $books->published = $request->published;

    $books->save();
    return redirect('/');
});

Route::post('/booksedit/{book}', function (Book $books) {
   
   return view('booksedit', ['book' => $books]); 
});

Route::post('/books/update', function(Request $request) {
   $validator = Validator::make($request->all(),
                                ['id' => 'required'],
                                ['item_name' => 'required | min:1 |max:255'],
                                ['item_number' => 'required | min:1 | max: 3'],
                                ['item_amount' => 'required | min:1 | max: 6'],
                                ['item_author' => 'required | min:1 | max: 64'],
                                ['item_publisher' => 'required | min:1 | max: 64'],
                                ['published' => 'required']); 
    if ($validator->fails()) {
        return redirect('/')
                    ->withInput()
                    ->withErrors($validator);
    }
    
    $books = Book::find($request->id);
    $books->item_name = $request->item_name;
    $books->item_number = $request->item_number;
    $books->item_amount = $request->item_amount;
    $books->author = $request->author;
    $books->publisher = $request->publisher;
    $books->published = $request->published;
    
    $books->save();
    return redirect('/');
});

Route::delete('/book/{book}', function (Book $book) {
    $book->delete();
    return redirect('/');
});