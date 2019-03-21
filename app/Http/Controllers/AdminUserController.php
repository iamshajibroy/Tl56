<?php

namespace App\Http\Controllers;

use App\AdminUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AdminUserController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }
    public function index()
    {
       return view('admin.pages.login');
    }

    
    public function store(Request $request)
    { 
        //Validation
       $request->validate([ 
        'email' =>'required|email',
        'password' =>'required',
       ]);

       //login User
       $credentials = $request->only('email', 'password');
       if(!Auth::guard('admin')->attempt($credentials)){
        return back()->with([
            'message' => " Try again, Something went wrong! "
        ]); 
       }
        //Session message
       session()->flash('msg', 'You have logged in');
       return redirect('/admin/dashboard');

    }

     public function logout() {
        auth()->guard('admin')->logout();

        session()->flash('msg','You are logged out');

        return redirect('/admin/login');
    }
}
