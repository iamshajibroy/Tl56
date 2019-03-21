<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Category;


class UserProfileController extends Controller
{
	 

    public function index(){

    $id = auth()->user()->id;
   	$user = User::find($id);
    $posts = Post::where([
                        ['added_by','=', $id]
                    ])->get();
   	return view('front.profile.index', compact('user', 'posts'));
    
   }
   
   public function viewPost($id){
   	 $post = Post::find($id);
   	 return view('front.profile.show',compact('post'));
   }
   
   public function editPost($id){
        $post = Post::find($id);
        $categories = Category::all();
        return view('front.profile.editPost', compact('post', 'categories'));
   }

   public function updatePost(Request $request){

    $dd($request->all());

 }

   public function deletePost($id){
   	  Post::find($id)->delete();
   	  return redirect()->back()
   	  ->with('success', 'Succefully post deleted!');
   }
}
