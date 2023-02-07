@extends('layouts.front')

@section('title')
{{$category->name}}
@endsection

@section('content')
<div class="py-3 container mb-4 shadow-sm bg-color border-top">
    <div class="">
        <h5 class="mb-0 text-white">
            <a class="text-white" href="{{url('/')}}">Home</a> /
            <a class="text-white" href="">{{$category->name}}</a>
        </h5>
    </div>
</div>
<div class="container mt-3">
    <div class="row">
        @foreach ($products as $item)
        <div class="col-md-3 mb-3">
            <a class="text-dark" href="{{url('view-category/'.$category->slug.'/'.$item->slug)}}">
                <div class="card">
                     @php
                     $images = json_decode($item->image);
                     @endphp
                    <img src="{{asset('upload/product/'.$images[0])}}" alt="">
                    <div class="card-body">
                        <h5 class="name" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;text-align: left !important; font-size:15px;">{{$item->name}}</h5>
                        <span class="float-left" style="  font-weight: 800;  font-size: 25px;">${{$item->selling_price}}</span>
                        <span  class="float-right" style="  font-size: 25px;  font-weight: 800;"><strike>${{$item->original_price}}</strike></span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@include('layouts.inc.footer')
@endsection
