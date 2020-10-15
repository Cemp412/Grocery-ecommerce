<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use Image;

class ProductController extends Controller
{
    public function add_product(Request $request){
    	if($request->ismethod('post')){
    		$data = $request->all();
    		// echo "<pre>"; print_r($data);
    		// die;

    		$product = new Product();
            $product->category_id = $data['category_id']; 
    		$product->name = $data['name'];
    		$product->code = $data['code'];

    		if(!empty($data['description'])){
    			$product->description = $data['description'];
    		}
    		else{
    			$product->description = '';
    		}
    		$product->price = $data['price'];

    		if(!empty($data['old_price'])){
    		$product->old_price = $data['old_price'];
            }
            else{
            	$product->old_price = '';
            }
            
    		//upload image
    		if($request->hasfile('image')){
    			echo $img_tmp = Input::file('image');
    			if($img_tmp->isValid()){
    			//image path code
    			$extension = $img_tmp->getClientOriginalExtension();
    			$filename = rand(111, 99999).'.'.$extension;
    			$img_path = 'uploads/products/image/'.$filename;


    			//Image resize
    			Image::make($img_tmp)->resize(500,500)->save($img_path);
    			$product->image = $filename;

    		}
    	}

    		$product->save();
    		return redirect('/admin/view_products')->with('flash_message_success', 'Product has been added successfully !!');

    	}


        //Category Dropdown menu code

        $categories = Category::where(['parent_id' => 0])->get();
        $categories_dropdown = "<option value = '' selected disabled>select</option>";
        foreach($categories as $cat){
            $categories_dropdown .="<option value = '".$cat->id."'>".$cat->name."<option>";
            $sub_categories = Category::where(['parent_id' => $cat->id])->get();

            foreach($sub_categories as $sub_cat){
                $categories_dropdown .="<option value='".$sub_cat->id."'>&nbsp --&nbsp".$sub_cat->name."<option>";
            }
        }
    	return view('admin.products.add_product', compact('categories_dropdown'));
    }

     public function view_products(){
    	 $product = Product::orderBy('id','desc')->get();
        //print_r($pro);
    	return view('admin.products.view', compact('product'));
    }

    public function edit_product(Request $request,  $id){
        if($request->isMethod('post')){
            $data = $request->all();

            //upload Image
            if($request->hasfile('image')){
                echo $img_tmp = Input::file('image');
                if($img_tmp->isValid()){

                    //image path code
                    $extension = $img_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).'.'.$extension;
                    $img_path = 'uploads/products/image/'.$filename;

                    //Image resize
                    Image::make($img_tmp)->resize(500,500)->save($img_path);

                }
            }
            else{
                    $filename = $data['current_image'];
              }


              if(empty($data['description'])){
                  $data['description'] = '';
            }
           
            
            if(empty($data['old_price'])){
                 $data['old_price'] = '';
            }
            


            Product::where(['id' => $id])->update([ 
                'name' => $data['name'],
                'category_id' => $data['category_id'],
                'code' =>$data['code'],
                'description' => $data['description'],
                'price'  => $data['price'],
                'old_price' => $data['old_price'],
                'image' =>$filename]);
            return redirect('/admin/view_products')->with('flash_message_success', 'Product has been updated !!');
        }

        $ProductDetails = Product::where(['id' =>$id])->first();


        //Category Dropdown Code
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown =  "<option value = '' selected disabled>select</option>";
        foreach($categories as $cat){
            if($cat->id == $ProductDetails->category_id){
                $selected = "selected";
            }else{
                $selected = '';
            }
             $categories_dropdown .="<option value='".$cat->id."' " .$selected.">".$cat->name."<option>";
        }

        //code for sub categories
        $sub_categories = Category::where(['parent_id' => $cat->id])->get();
        foreach($sub_categories as $sub_cat){
             if($cat->id == $ProductDetails->category_id){
                $selected = "selected";
            }else{
                $selected = '';
            }
             $categories_dropdown .="<option value='".$sub_cat->id."' " .$selected.">&nbsp;--&nbsp".$sub_cat->name."<option>";
        }

      return view('admin.products.edit_product', compact('ProductDetails', 'categories_dropdown'));
    }

    public function delete_product($id = null){
    Product::where(['id' =>$id])->delete();
    return redirect('admin/view_products')->with('flash_message_error', 'Record has been deleted !!!');
    }


    public function updateStatus($id, $status){
        $data = Product::find($id);
        $data->status = $status;
        $data->save();
        return response()->json(['message' => 'success']);
       // $data = $request->all();
       // Products::where(['id' => $id])->update(['status' =>$data['status']]);
    }

    public function products($id= null){
        $ProductDetails = Product::where('id', $id)->first();
         // echo $ProductDetails; die;
        return view('grocery.product_detail', compact('ProductDetails'));
    }

    public function add_attributes(Request $request, $id=null){
        $ProductDetails = Product::where(['id' => $id])->first();
        if($request->isMethod('post')){
            $data= $request->all();
            echo "<pre>" ;
            print_r($data);
            die;
        }
        return view('admin.products.add_attributes', compact('ProductDetails'));
    }
}
