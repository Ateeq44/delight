@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-product/'.$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="input-group mb-3 px-3">
                    <select class="custom-select form-control" name="cate_id"  id="inputGroupSelect01">
                        <option selected>Select Category</option>
                        @foreach ($category as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" value="{{$product->name}}" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Slug</label>
                    <input type="text" class="form-control" value="{{$product->slug}}" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="name">Description</label>
                    <textarea  class=" form-control"  name="description">{{$product->description}}</textarea>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Original Price</label>
                    <input type="number" class=" form-control" value="{{$product->original_price}}"  name="original_price">

                </div>
                <div class="col-md-6 mb-3 ">
                    <label for="name">Selleing Price</label>
                    <input type="number" class=" form-control" value="{{$product->selling_price}}" checked  name="selling_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Tax</label>
                    <input type="number" class="form-control" value="{{$product->tax}}" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Quantity</label>
                    <input type="number" class="form-control" value="{{$product->qty}}" name="qty">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Status</label>
                    <input type="checkbox" class="ml-3" {{$product->status == "1" ? 'checked':''}}  name="status">

                </div>
                <div class="col-md-6 mb-3 ">
                    <label for="name">Trending</label>
                    <input type="checkbox" class="ml-3" checked {{$product->popular == "1" ? 'checked':''}}  name="trending">
                </div>
                <div class="col-ms-3">
                    <img class="w-25"  src="{{ asset('/upload/product').'/'.$product->image}}">
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" multiple="multiple" name="image[]" class="form-control" >
                </div>
                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection