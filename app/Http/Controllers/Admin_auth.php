<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class Admin_auth extends Controller
{
    function login_submit(Request $request){
		$username = $request->input('username');
		$password = $request->input('password');

		$result=DB::table('user') 
				->where('username',$username)
				->where('password',$password)
				->get();
		if(isset($result[0]->id))
		{
			$request->session()->put('BLOG_USER_ID',$result[0]->id);
			return redirect('admin/post/list');
		}else{
			$request->session()->flash('msg','Please Enter valid login details.');
			return redirect('admin/login');
		}
		

	}

	
}
