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
			<form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3 px-3">
                        <select class="custom-select form-control" name="sub_cate_id"  id="inputGroupSelect01">
                            <option selected>Select Category</option>
                            @foreach ($category as $item)
                            <option  value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3 px-3">
                        <select class="custom-select form-control" name="cate_id"  id="inputGroupSelect01">
                            <option selected>Select SubCategory</option>
                            @foreach ($subcategory as $item)
                            <option  value="{{$item->id}}">{{$item->subcategory}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">Description</label>
                        <textarea rows="5" class=" form-control"  name="description"></textarea>

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Original Price</label>
                        <input type="number" class=" form-control"  name="original_price">

                    </div>
                    <div class="col-md-6 mb-3 ">
                        <label for="name">Selleing Price</label>
                        <input type="number" class=" form-control" checked  name="selling_price">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Tax</label>
                        <input type="number" class="form-control" name="tax">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Quantity</label>
                        <input type="number" class="form-control" name="qty">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name">Image Upload</label>
                        <input type="file" multiple="multiple" name="image[]" class="form-control">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="name">Status</label>
                        <input type="checkbox" class="ml-3"  name="status">

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
</script>
@endsection
