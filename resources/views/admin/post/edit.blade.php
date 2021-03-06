@extends('admin/layout.layout')

@section('page_title','Manage Post')

@section('container')

   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Edit Blog</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                              <form class="form-horizontal form-label-left" method="post" action="{{ url('/admin/post/update/'.$result['0']->id) }}" enctype="multipart/form-data">
                              @csrf
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Title</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control" placeholder="Title" name="title" value="{{$result['0']->title}}" >
                                       @error('title')
                                       <span style="color:red">{{$message}}</span>
                                       @enderror
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Short Desc</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="short_desc" >{{$result['0']->short_desc}}</textarea>
                                       @error('short_desc')
                                       <span style="color:red">{{$message}}</span>
                                       @enderror
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Blog Content</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="long_desc" >{{$result['0']->post_content}}</textarea>
                                       @error('long_desc')
                                       <span style="color:red">{{$message}}</span>
                                       @enderror
                                    </div>
                                 </div>
                                 

                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Category</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" name="category" value="{{$result['0']->category}}">
                                       @error('category')
                                       <span style="color:red">{{$message}}</span>
                                       @enderror
                                    </div>
                                 </div>

								 
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                       <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            

@endsection