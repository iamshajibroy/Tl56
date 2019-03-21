<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Post;

class PostController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
    	$posts = Post::all();
    	return view('admin.post.index', compact('posts'));
    }

    public function show($id){
    	$post = Post::Find($id);
    	return view('admin.post.show', compact('post'));
    }
    public function published($id){
    	$post =Post::Find($id);
    	$post->status = 1;
    	$post->save();
    	return redirect()->back()
    	->with('success', 'Post is published now'); 
    }
      public function unPublished($id){
    	$post =Post::Find($id);
    	$post->status = 0;
    	$post->save();
    	return redirect()->back()
    	->with('success', 'Post is unpublished now'); 
    }
}
