<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
	  public function index() {
        return view('front.sessions.index');
    }

      public function store(Request $request){

        // Validate the user
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $request->validate($rules);

        // Check if exists
        $data= request(['email','password']);
        if ( ! auth()->attempt($data) ) {
            return back()->with([
                'message' => 'Wrong credentials please try again'
            ]);
        }

        return redirect('/profile')
        ->with('success', 'Login Successfull, You can add your post now!');

    }

     public function logout(){
       auth()->logout();

        session()->flash('success','You have been logged out successfully');

        return redirect('/login');

     }
}
