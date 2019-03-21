<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $post     = Post::count();
        $user     = User::count();
        $category = Category::count();
        $requests = Post::where('status', 0)->count();
    	return view('admin.pages.dashboard', compact('post', 'user','category', 'requests'));
    }
    public function user(){
        $users = User::all();
      
        return view('admin.pages.users',compact('users'));
    }

}
