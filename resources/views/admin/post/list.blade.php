@extends('admin/layout.layout')

@section('page_title','Post Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Post</h4>
			<h2><a href="/admin/post/add">Add Post</a></h2>
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <h5>{{session('msg')}}</h5>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th>S.No</th>
									<th>Title</th>
									<th>Date</th>
									<th>Category</th>
									<th>Action</th >
									
								 </tr>
							  </thead>
							  <tbody>
							  @foreach($result as $list)
								 <tr>
									<td>{{ $list->id }}</td>
									<td>{{ $list->title }}</td>
									<td>{{ $list->blog_date }}</td>
									<td>{{ $list->category }}</td>
									<td>
									<a type="button" class="btn btn-info" href="{{url('admin/post/edit/'.$list->id)}}">Edit</a>
									<a type="button" class="btn btn-danger" href="{{url('admin/post/delete/'.$list->id)}}">Delete</a>
									</td>
 																											
								 </tr>
								@endforeach 
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
@endsection