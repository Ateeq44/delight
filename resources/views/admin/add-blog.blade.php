@extends('layouts.admin')
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4>Add Blog</h4>
		</div>
		<div class="card-body">
			<form action="{{url('insert-blog')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Blog Name</label>
                        <input type="text" required class="form-control" name="name">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="name">Author</label>
                        <input type="text" required name="author" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="name">Blog</label>
                        <textarea rows="5" class=" form-control" required name="blog"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <input type="file" required name="image" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name">Status</label>
                        <input type="checkbox" class="ml-3" required  name="status">
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
@section('script')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'blog' );
</script>
@endsection

