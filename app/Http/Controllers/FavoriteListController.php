<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavoriteList;
use App\Book;
use Validator;
use Auth;

class FavoriteListController extends Controller
{
    public function index() {
        $pagination_num = 5;
        $favorite_lists = FavoriteList::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc');
        $totalCount = $favorite_lists->count();
        $favorite_lists = $favorite_lists->paginate($pagination_num);
        $currentCount = $favorite_lists->count();
        
        $favorite_books = \DB::table('favorite_lists')
        ->join('books', 'favorite_lists.book_id', '=', 'books.id')
        ->get();
        
        return view('favoriteBooks', [
                                        'favorite_lists' => $favorite_lists,
                                        'favorite_books' => $favorite_books,
                                        'pagination_num' => $pagination_num,
                                        'totalCount' => $totalCount,
                                        'currentCount' => $currentCount
                                        ]);
    }
    
    public function store(Request $request) {
        $validator = Validator::make($request->all(), 
                                [
                                'book_id' => 'required'
                                ]);
    
        if ($validator->fails()) {
            return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
        }

        $list = new FavoriteList;
        
        $list->user_id = Auth::user()->id;
        $list->book_id = $request->book_id;

        $list->save();
        return redirect('/');
    }

    public function delete (FavoriteList $list) {
        $list->delete();
        return redirect('/books/favorite');
    }
}
