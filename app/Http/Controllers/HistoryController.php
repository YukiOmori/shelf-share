<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History;
use App\Book;
use Validator;
use Auth;

class HistoryController extends Controller
{
    public function index() {
        $pagination_num = 10;
        $history = History::where('user_id', Auth::user()->id)->orderBy('borrowed_from', 'desc');
        $totalCount = $history->count();
        $history = $history->paginate($pagination_num);
        $currentCount = $history->count();
        
        $history_books = \DB::table('histories')
        ->join('books', 'histories.book_id', '=', 'books.id')
        ->get();
        
        return view('history', [
                                        'history' => $history,
                                        'history_books' => $history_books,
                                        'pagination_num' => $pagination_num,
                                        'totalCount' => $totalCount,
                                        'currentCount' => $currentCount
                                        ]);
    }
}
