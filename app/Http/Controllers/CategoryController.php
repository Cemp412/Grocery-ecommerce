<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		$category = new Category;
    		$category->name = $data['name'];
    		$category->parent_id = $data['parent_id'];
    		$category->url = $data['url'];
    		$category->description = $data['description'];
            $category->status = $data['status'];
    		$category->save();

    		return redirect('/admin/add_category')->with('flash_message_success', 'Category has been added sucecessfully !!');
    	}
    	$level = Category::where(['parent_id' => 0])->get();
    	return view('admin.category.add_category', compact('level'));
    }

    public function viewCategories(){
        $categories = Category::get();
        return view('admin.category.view_categories', compact('categories'));
    }

    public function editCategory(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            Category::where(['id'=>$id])->update([
                'name' =>$data['category_name'],
                'parent_id' => $data['parent_id'],
                'description' => $data['description'],
                'url' => $data['url'],
            ]);
            return redirect('/admin/view_Categories')->with('flash_message_success', 'Category updated Successfully...!!');
        }

        $levels = Category::where(['id' =>$id])->first();
        $CategoryDetails = Category::where(['parent_id'=>0])->get();
       return view('admin.category.editCategory', compact('levels', 'CategoryDetails'));
    }
}
