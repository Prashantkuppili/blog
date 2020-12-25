<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Post extends Controller
{
    function add(){
        return view('admin/post/add');
    }

    function list()
    {
        $data['result']=DB::table('posts')->orderBy('id','desc')->get();        
        return view('admin/post/list',$data);
    }

    function submit(Request $request){
        $request->validate([
            'title'=>'required',
            'short_desc'=>'required',
            'long_desc'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'post_date'=>'required',
            'category'=>'required'
        ]);

        
        $image=$request->file('image');
        $ext=$image->extension();
        $file=time().'.'.$ext;
        $image->storeAs('public/images',$file);


        $data=array(
            'title'=>$request->input('title'),
            'short_desc'=>$request->input('short_desc'),
            'post_content'=>$request->input('long_desc'),
            'blog_date'=>$request->input('post_date'),
            'category'=>$request->input('category'),
            'image'=>$file,
            'status'=>1
        );
        DB::table('posts')->insert($data);
        $request->session()->flash('msg','Data Saved!!!');
        return redirect('/admin/post/list');
    }

    function delete(Request $request,$id){
        DB::table('posts')->where('id',$id)->delete();
        $request->session()->flash('msg','Row Deleted!!!');
        return redirect('/admin/post/list');
    }
    
    function edit(Request $request,$id){
        $data['result']=DB::table('posts')->where('id',$id)->get();            
        return view('admin/post/edit',$data);
    }

    function update(Request $request,$id){

        $request->validate([
            'title'=>'required',
            'short_desc'=>'required',
            'long_desc'=>'required',
            'category'=>'required'
        ]);

        


        $data=array(
            'title'=>$request->input('title'),
            'short_desc'=>$request->input('short_desc'),
            'post_content'=>$request->input('long_desc'),            
            'category'=>$request->input('category')          
        );
        DB::table('posts')->where('id',$id)->update($data);
        $request->session()->flash('msg','Blog Updated!!!');
        return redirect('/admin/post/list');
        
    }

    function getBlogs(){
        $data['result']=DB::table('posts')->orderBy('id','desc')->get();        
        return view('blog',$data);
    }

}
