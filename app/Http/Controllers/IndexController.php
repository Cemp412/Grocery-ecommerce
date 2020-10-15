<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Category;
use App\Product;

class IndexController extends Controller
{
    public function index(){
    	$banners = Banner::where('status', '1')->orderBy('sort_order', 'asc')->get();
    	$categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $Products = Product::get();
    	return view('grocery.index')->with(compact('banners', 'categories', 'Products'));
    }
}
