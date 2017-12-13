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
        $list = FavoriteList::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(5);
        // $books = Book::where('id', $list->book_id);
        return view('favoriteBooks', ['list' => $list]);
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
        return redirect('/');
    }
}
