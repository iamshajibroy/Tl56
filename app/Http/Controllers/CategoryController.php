<?php

namespace App\Http\Controllers;
use App\Category;
use App\AdminUser;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
        
    }
 
    public function create()
    {
        return view('admin.category.create');
    }

    
    public function store(Request $request)
    {
        //validate data 
        $messages = array(
            'category_name.required' => 'Category name is required'
        );

        $this->validate($request, array(
            'category_name' =>'required|max:255'
        ), $messages);

          //store data
         $category = new Category;
         $category->category_name = $request->category_name;
         $category->category_details = $request->category_details;
         $category->added_by = Auth()->guard('admin')->user()->id;
         $category->save(); 
         return redirect('/admin/category')->with('success', 'New Category Has Been Added !');
     }

     
    public function show(Category $category)
    {
        //dd($category);
        return view('admin.category.show',compact('category'));
    }

    
    public function edit(Category $category)
    {
       
           
         return view('admin.category.edit', compact('category'));
        
    }

    
    public function update(Request $request, Category $category)
    {
     
     
      //validation
        $messages = array(
            'category_name.required' => 'Category Name is Required.',
             
        );
        $this->validate($request, array(
            'category_name' => 'required|max:255',     
        ),$messages);

        // store in the database
     

        $category->category_name = $request->category_name;
        $category->added_by = Auth()->guard('admin')->user()->id;
        $category->category_details = $request->category_details;
        $category->save();

     // $category->update($request->all());
 

        return redirect()->back()
        ->with('success', ' Category Info Has Been Updated !');

    }

     
    public function destroy(Category $category)
    {
        
        $category->delete();
        return redirect()->back()
        ->with('success', 'Category Has Been Deleted !');

    }
}
