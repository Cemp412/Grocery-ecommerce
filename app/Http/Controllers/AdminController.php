<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class AdminController extends Controller
{
	public function login(Request $request){
      if($request->isMethod('post')){
      	$data = $request->input();
      	if(Auth::attempt(['email' =>$data['email'], 'password'=>$data['password']])){
      		return redirect('/admin_dashboard');
      	}else{
      		return redirect('/admin')->with('flash_message_error', 'Invalid username or password');
      	}
      }
		return view('admin.admin_auth.admin_login');
	}
    public function dashboard(){
    	return view('admin.layouts.master');
    }

    public function logout(){
      session::flush();
      return redirect('/admin')->with('flash_message_success', 'you logged out successfully!!');
    }
}
