<style>
    .cke_editable {
        height: 100% !important;
    }
</style>
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4>Add Product</h4>
		</div>
		<div class="card-body">
			<form action="{{url('submit-detail')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="name">Color</label>
                        <input type="text" class="form-control" name="color">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name">Size</label>
                        <input type="text" class="form-control" name="size">
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
    CKEDITOR.replace( 'description' );

    $(document).ready(function() {
        $(".js-example-basic-single").select2();
    });
</script>
@endsection
