<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //fetch All Category data
    public function Index(){
        // $categories = Category::paginate(3);
        $categories = Category::all();
        // $categories = Category::where('title', 'Books')->get();
        // $categories = Category::where('title', 'Books')->paginate(1);
        // $categories = Category::limit(2)->get();
        //specific id
        // $categories = Category::findorFail(8);
        //TOp 3 records
        // $categories = Category::orderBy('id', 'asc')->limit(3)->get();
        
        //Bottom 3 records
        // $categories = Category::orderBy('id', 'desc')->limit(3)->get();

        // $categories = Category::where('id', '>',5)->get();
        //latest 2 records
        // $categories = Category::latest()->limit(2)->get();

        //count of records
        // $categories = Category::count();

        return view('Admin.Category.ManageCategory', compact('categories'));
    }
    //Add Category file
    public function Create()
    {
        return view('Admin.Category.create');
    }

    //insert category form data 
    public function Store(Request $request){

        $imageName = null;

        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads/category'), $imageName);
        }
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);
        return redirect()->route('admin.manageCategory')->with('success', 'Category added successfully!');
    }

    public function Delete($id){
        $categories = Category::findorFail($id);
        $categories->delete();

        return redirect()->back()->with('success','Category Deleted SUccessfully!');
    }
    
    //work for update category
    public function Edit($id){
        $category = Category::findorFail($id);
        return view('Admin.Category.EditCategory',compact('category'));
    }

    public function Update(Request $request,$id){
        $category = Category::findorFail($id);
        $category->title = $request->title;
        $category->description = $request->description;

        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads/category'), $imageName);

            $category->image = $imageName;
        }

        $category->save();
        return redirect()->route('admin.manageCategory')->with('success', 'Category Updated successfully!');

    }

}