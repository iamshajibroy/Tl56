<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){

    	return view('front.register.index');
    }

    public function store(Request $request ){

     	 // Validate the user
        $request->validate([
           'name'       => 'required',
            'email'     => 'required|email',
            'password'  => 'required|confirmed',
            'address'   => 'required'
        ]);

 //Save data
        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
            'address'    => $request->address,
            'image'      => 'avatar.jpg',
        ]);

        // // Sign the user in
        auth()->login($user);

        // Redirect to
        return redirect('/');

     }
}
