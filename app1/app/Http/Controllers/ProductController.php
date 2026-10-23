<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    //show all product in table
    public function Index(){
        $category = Category::all();
        $products = Product::all();
        return view('Admin.Product.ManageProducts',compact('products','category'));
    }
    //show form
    public function Create()
    {
        $categories = Category::all();
        return view('Admin.Product.CreateProduct',compact('categories'));
    }

    //insert category form data 
    public function Store(Request $request){

        $imageName = null;

        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads/product'), $imageName);
        }
        Product::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageName,
        ]);
        return redirect()->route('admin.addProduct')->with('success', 'Product added successfully!');
    }

    public function Delete($id){
        $categories = Product::findorFail($id);
        $categories->delete();

        return redirect()->back()->with('success','Product Deleted SUccessfully!');
    }
}
