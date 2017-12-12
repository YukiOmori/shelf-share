<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function edit($user_id) {
       $user_id = User::where('user_id', Auth::user()->id);
       return view('useredit', ['user_id' => $user_id]); 
    }
    
    public function update(Request $request) {
       $validator = Validator::make($request->all(),
                                ['id' => 'required',
                                'name' => 'required|string|max:255',
                                'email' => 'required|string|email|max:255|unique:users']); 
                                
        if ($validator->fails()) {
            return redirect('/')
                        ->withInput()
                        ->withErrors($validator);
        }
    
        $user = User::where('id', Auth::user()->id)->find($request->id);
        
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return redirect('/');
       
    }
}
