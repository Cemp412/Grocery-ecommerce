<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use RealRashid\SweetAlert\Facades\Alert;
use App\Banner;
use Image;

class BannerController extends Controller
{

	public function banners(){
        $banner = Banner::orderBy('id', 'desc')->get();
		return view('admin.banner.view_banner', compact('banner'));
	}
    public function add_banners(Request $request){
    	if($request->isMethod('post')){

    		$data = $request->all();
    		$banner= new Banner();
    		$banner->name = $data['banner_name'];
        $banner->span_content = $data['span_content'];
    		$banner->text_style = $data['text_style'];
    		$banner->content = $data['content'];
    		$banner->sort_order = $data['sort_order'];
    		$banner->link = $data['link'];


    		//upload image
    		if($request->hasfile('image')){
    			echo $img_tmp = Input::file('image');
    			   if($img_tmp->isValid()){
    			       //image path code
    			       $extension = $img_tmp->getClientOriginalExtension();
    			       $filename = rand(111, 99999).'.'.$extension;
    			       $banner_path = 'uploads/banners/'.$filename;


    			       //Image resize
    			       Image::make($img_tmp)->resize(500,500)->save($banner_path);
    			       $banner->image = $filename;
    		        }
    		    }
    	
           $banner->save();
           return redirect('/admin/banners')->with('flash_message_success', 'Banner Added Successfully..! ');
    	}

    	return view('admin.banner.add_banner');
    }

    public function edit_banner(Request $request, $id){
        if($request->isMethod('post')){
          $data =$request->all();
            //upload image
            if($request->hasfile('image')){
                echo $img_tmp = Input::file('image');
                   if($img_tmp->isValid()){
                       //image path code
                       $extension = $img_tmp->getClientOriginalExtension();
                       $filename = rand(111, 99999).'.'.$extension;
                       $banner_path = 'uploads/banners/'.$filename;


                       //Image resize
                       Image::make($img_tmp)->resize(500,500)->save($banner_path);
                       
                    }
                }
        
           
        
        else{
           $filename = $data['current_image'];
        }
        Banner::where(['id' =>$id])->update([
          'name' =>$data['banner_name'],
          'span_content' => $data['span_content'],
          'text_style' =>$data['text_style'],
          'content' =>$data['content'],
          'sort_order' =>$data['sort_order'],
          'link' =>$data['link'],
           'image'=>$filename,
        ]);
        return redirect()->back()->with('flash_message_success', 'Banner has been updated...!!');
    }
       $edit = Banner::where(['id'=> $id])->first();
       return view('admin.banner.edit_banner', compact('edit'));
   
  }

   public function delete_banner($id = null){
    
    Banner::where(['id'=> $id])->delete();
      Alert::Success('Deleted', 'Success Message');
    return redirect('admin/banners')->with('flash_message_error', 'Banner has been deleted !!!');
    }

}
