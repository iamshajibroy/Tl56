<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use Image;
class PostController extends Controller
{
	 

     public function store(Request $request)
    {

    	 
        //validation
        $messages = array(
            'title.required' => 'Post title is Required.',
            'category_id.required' => 'Category Name is Required.',
            'rent.required' => 'Rent is Required.',
            'cell.required' => 'Cell number is Required.',
            'start_date.required' => 'Date is Required.',
        );
        $this->validate($request, array(
            'category_id' => 'required',
            'title' => 'required|max:255',
            'rent' => 'required|numeric',     
            'start_date' => 'required',     
            'cell' => 'required|min:11',     
        ),$messages);


        // store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->start_date = $request->start_date;
        $post->category_id = $request->category_id;
        $post->rent = $request->rent;
        $post->cell = $request->cell;
        $post->added_by = Auth()->user()->id;
        $post->house_details = $request->house_details;
        $post->address = $request->address;
        
        //dd($request->image);
      // for image
       if(!empty($request->File('image'))){  
             
             $file = $request->file('image');
            // dd($request->image);
             $filename  = time() . '.' . $file->getClientOriginalExtension();
             $destinationPath = public_path('images/front/posts/' . $filename);
             Image::make($file)->resize(950, 700)->save($destinationPath);
             $post->image = $filename;  
         
        }

        $post->save();

        return redirect()->back()->with('success', 'Post is submitted, will be published soon after review !');
    }

     public function show($id) {
       
    }
}
