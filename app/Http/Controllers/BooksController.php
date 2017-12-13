<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Validator;
use Auth;
use Carbon\Carbon;

class BooksController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function home() {
        return view('home');
    }

    public function index() {
        $books = Book::orderBy('created_at', 'asc')->paginate(5);
        $nowDate = new Carbon(Carbon::now());
        return view('books', ['books' => $books, 'nowDate' => $nowDate]);
    }
    
    public function indexLend() {
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(5);
        return view('booksLend', ['books' => $books]);
    }
    
    public function indexBorrow() {
        $books = Book::where('borrower_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(5);
        return view('booksBorrow', ['books' => $books]);
    }
    
    public function edit($book_id) {
       $books = Book::where('user_id', Auth::user()->id)->find($book_id);
       return view('booksedit', ['book' => $books]); 
    }

    public function register() {
        return view('bookRegister');
    }
    
    public function store(Request $request) {
        $validator = Validator::make($request->all(), 
                                ['item_name' => 'required | min:1 |max:255',
                                'author' => 'required | max: 20',
                                'store' => 'required',
                                'publisher' => 'required | min:3 | max: 20',
                                'published' => 'required'
                                ]);
    
        if ($validator->fails()) {
            return redirect('/books/registerz')
                        ->withInput()
                        ->withErrors($validator);
        }
    
        $file = $request->file('item_img');
        
        if(!empty($file)) {
            $filename = $file->getClientOriginalName();
            $move = $file->move('./upload/', $filename);  // $move必要？
        } else {
            $filename = "";
        }
    
        $books = new Book;
        
        $books->user_id = Auth::user()->id;
        $books->item_name = $request->item_name;
        $books->author = $request->author;
        $books->store = $request->store;
        $books->publisher = $request->publisher;
        $books->published = $request->published;
        $books->borrower_id = 0;
        $books->borrower = 'Available';
        $books->owner = Auth::user()->name;
        $books->return_date = '';
        $books->item_img = $filename;

    // TODO: ここにエラー発生の場合飛んでしまわないように分岐したい
        $books->save();
        return redirect('/');
    }

    public function update(Request $request) {
       $validator = Validator::make($request->all(),
                                ['id' => 'required',
                                'item_name' => 'required | min:1 |max:255',
                                'item_number' => 'required | min:1 | max: 3',
                                'item_amount' => 'required | min:1 | max: 6',
                                'author' => 'required | min:3 | max: 20',
                                'publisher' => 'required | min:3 | max: 20',
                                'published' => 'required']); 
        if ($validator->fails()) {
            return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
        }
    
        $books = Book::where('user_id', Auth::user()->id)->find($request->id);
        
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
