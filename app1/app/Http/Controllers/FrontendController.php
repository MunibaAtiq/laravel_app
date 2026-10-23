<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //show products in card
     public function Index(){
        $category = Category::all();
        $products = Product::all();
        return view('Frontend.shop',compact('products','category'));
    }
}
