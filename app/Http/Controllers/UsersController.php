<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Validator;
use Auth;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function edit($user_id) {
       $user_data = Book::where('user_id', Auth::user()->id);
       return view('useredit', ['user' => $user_data]); 
    }
}
