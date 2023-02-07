@extends('layouts.admin')
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4>Add Blog</h4>
		</div>
		<div class="card-body">
			<form action="{{url('update-blog/'.$blog->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" required value="{{$blog->name}}" class="form-control" name="name">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Slug</label>
                    <input type="text" required value="{{$blog->slug}}" class="form-control" name="slug">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="name">Blog</label>
                    <textarea rows="5" class=" form-control" required value="" name="blog">{{$blog->blog}}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Status</label>
                    <input type="checkbox" class="ml-3" value="{{$blog->status == "1" ? 'checked':''}}"  name="status">
                </div>

                <div class="col-md-6 mb-3 ">
                    <label for="name">Popular</label>
                    <input type="checkbox" class="ml-3" value="{{$blog->popular == "1" ? 'checked':''}}" checked  name="popular">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Author</label>
                    <input type="text" required value="{{$blog->user_id}}" name="author" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <img class="" style="width:100px;"  src="{{ asset('/upload/blog').'/'.$blog->image}}">

                    <input type="file" required value="" name="image" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
		</div>
	</div>
</div>
@endsection
