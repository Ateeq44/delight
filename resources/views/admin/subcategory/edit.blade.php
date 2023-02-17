@extends('layouts.admin')
@section('content')
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4>Add Sub Category</h4>
		</div>
		<div class="card-body">
			<form action="{{url('update-subcategory/'.$SubCategory->id)}}" method="post">
            @csrf
            <div class="row">
                <div class="input-group mb-3 px-3">
                        <select class="custom-select form-control" name="cate_id"  id="inputGroupSelect01">
                            <option selected>Select Category</option>
                            @foreach ($category as $item)
                            <option  value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Sub Category</label>
                    <input type="text" class="form-control" value="{{ $SubCategory->subcategory }}" name="subcategory">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Status</label>
                    <input type="checkbox" class="ml-3" {{$SubCategory->status == "1" ? 'checked':''}}  name="status">

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
