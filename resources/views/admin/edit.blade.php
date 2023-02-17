@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Update Category</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-category/'.$category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Name</label>
                    <input type="text" value="{{$category->name}}" class="form-control" name="name">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name">Status</label>
                    <input type="checkbox" class="ml-3" {{$category->status == "1" ? 'checked':''}} name="status">

                </div>
            
                <div class="col-md-12 mb-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
