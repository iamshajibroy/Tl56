<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Post;
class HomePageController extends Controller
{
    public function index(){
        $posts = Post::where('status', 1)-> orderBy('id', 'desc')->paginate(5);
    	$categories = Category::all();
    	return view('front.pages.index',compact('categories', 'posts'));
    }

     public function about(){
      

     return view('front.pages.about');
    }

    public function howToUse(){
      

     return view('front.pages.howToUse');
    }

    public function search(Request $request){
        
        $request->validate([
            'query' => 'required|min:3',
        ]);
        $query = $request->input('query');
        $posts = Post::where('title', 'like', "%$query%")
                           ->orWhere('house_details', 'like', "%$query%")
                           ->orWhere('address', 'like', "%$query%")
                           ->paginate(10);
       // $posts = Post::search($query)->paginate(10);
       // dd($posts);
        return view('front.pages.searchResult', compact('posts'));


    }

    public function detail($id){
         $post = Post::find($id);
         $categories = Category::all();
    	return view('front.pages.detail',compact('post', 'categories'));
    }
    public function adPost(){
    	 if (Auth::User()) {
    	 	$categories = Category::all();
    	  
           return view('front.post.create', compact('categories'));
        } else {
            return redirect()->back()
            ->with('message', 'You must Login to Create Posts.');
        }
    }

    public function categoryView($id){
     $categories = Category::all();
     $posts = Post::where('category_id', $id)
                    ->where('status', 1)->get();

       return view('front.pages.categorized', compact('posts', 'categories'));

    }


     


}
