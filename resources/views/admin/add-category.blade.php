@extends('layouts.admin')
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4>Add Category</h4>
		</div>
		<div class="card-body">
			<form action="{{url('insert-category')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Status</label>
                    <input type="checkbox" class="ml-3"  name="status">

                </div>
                <div class="col-md-6 mb-3 ">
                    <label for="name">Popular</label>
                    <input type="checkbox" class="ml-3" checked  name="popular">
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" name="image" class="form-control">
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
