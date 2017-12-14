<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\History;
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
        $pagination_num = 5;
        $books = Book::orderBy('created_at', 'asc');
        $totalCount = $books->count();
        $books = $books->paginate($pagination_num);
        $currentCount = $books->count();
        $nowDate = new Carbon(Carbon::now());
        return view('books', ['books' => $books, 'nowDate' => $nowDate,
                            'pagination_num' => $pagination_num,
                            'totalCount' => $totalCount,
                            'currentCount' => $currentCount
                            ]);
    }
    
    public function indexLend() {
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(5);
        return view('booksLend', ['books' => $books]);
    }
    
    public function indexBorrow() {
        $books = Book::where('borrower_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(5);
        return view('booksBorrow', ['books' => $books]);
    }

    public function showDetail($book_id) {
       $books = Book::find($book_id);
       if ($books->user_id == Auth::user()->id) {
           return view('booksedit', ['book' => $books]); 
       } else {
           return view('bookDetail', ['book' => $books]);    
       }
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
                                [
                                'id' => 'required',
                                'item_name' => 'required | min:1 |max:255',
                                'author' => 'required | min:3 | max: 20',
                                'publisher' => 'required | min:3 | max: 20',
                                'published' => 'required'                                
                                ]); 
        if ($validator->fails()) {
            return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
        }
    
        $books = Book::find($request->id);
        
        $books->item_name = $request->item_name;
        $books->author = $request->author;
        $books->publisher = $request->publisher;
        $books->published = $request->published;
        $books->borrower_id = $request->borrower_id;
        $books->borrower = $request->borrower;
        $books->save();
        return redirect('/');
    }
    
    public function addBorrower(Request $request) {
        $validator = Validator::make($request->all(),
                                ['id' => 'required',
                                'borrower_id' => 'required',
                                'borrower' => 'required',
                                // 'start_date' => 'required',
                                'return_date' => 'required'
                                ]);
                                
        if ($validator->fails()) {
            return redirect('/books/register')
                            ->withInput()
                            ->withErrors($validator);
        }                        
                                
        $books = Book::find($request->id);
        
        $books->borrower_id = $request->borrower_id;
        $books->borrower = $request->borrower;
        // $books->start_date = $request->start_date;
        $books->return_date = $request->return_date;
        
        // historyの追加（TODO:理想的にはメソッド呼び出し）
        $history = new History;
        $history->user_id = Auth::user()->id;
        $history->book_id = $request->id;
        $nowDate = new Carbon(Carbon::now());
        $history->borrowed_from = $nowDate;
        
        $books->save();
        $history->save();
        return redirect('/');
    }
     
    public function deleteBorrower(Request $request) {
        $validator = Validator::make($request->all(),
                                [
                                    'id' => 'required'
                                ]);
                                
        if ($validator->fails()) {
            return redirect('/books/register')
                            ->withInput()
                            ->withErrors($validator);
        }                        
                                
        $books = Book::find($request->id);
        
        $books->borrower_id = 0;
        $books->borrower = 'Available';
        // $books->start_date = '';
        $books->return_date = '';
        $books->save();
        
        return redirect('/books/borrow');
    }

    public function delete (Book $book) {
        $book->delete();
        return redirect('/books/lend');
    }
}
