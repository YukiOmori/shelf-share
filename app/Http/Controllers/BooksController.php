<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;

class BooksController extends Controller
{
    public function showBooksTable() {
        $books = Book::orderBy('created_at', 'asc')->paginate(3);
        return view('books', ['books' => $books]); // 質問：viewの第二引数の役割とここの記述の意味
    }
    
    public function showBookData(Book $books) {
       return view('booksedit', ['book' => $books]); 
    }
    //更新
    public function update(Request $request) {
       $validator = Validator::make($request->all(),
                                ['id' => 'required',
                                'item_name' => 'required | min:1 |max:255',
                                'item_number' => 'required | min:1 | max: 3',
                                'item_amount' => 'required | min:1 | max: 6',
                                'author' => 'required | min:1 | max: 10',
                                'publisher' => 'required | min:1 | max: 10',
                                'published' => 'required']); 
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
    }
    
    public function store(Request $request) {
        $validator = Validator::make($request->all(), 
                                ['item_name' => 'required | min:1 |max:255',
                                'item_number' => 'required | min:1 | max: 3',
                                'item_amount' => 'required | min:1 | max: 6',
                                'author' => 'required | min:1 | max: 10',
                                'publisher' => 'required | min:1 | max: 10',
                                'published' => 'required']);
    
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
        $books->publisher = $request->publisher;
        $books->published = $request->published;
    
        $books->save();
        return redirect('/');
    }
    
    public function delete (Book $book) {
        $book->delete();
        return redirect('/');
    }
}
