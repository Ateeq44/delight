@extends('layouts.front')

@section('title')
{{$category->name}}
@endsection

@section('content')
{{-- <div class="py-3 container mb-4 shadow-sm bg-color border-top">
    <div class="">
        <h5 class="mb-0 text-white">
            <a class="text-white" href="{{url('/')}}">Home</a> /
            <a class="text-white" href="">{{$category->name}}</a>
        </h5>
    </div>
</div> --}}
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ url('/') }}">Home</a>
                <a class="breadcrumb-item text-dark" href="">{{$category->name}}</a>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"> Sub Categories</span></h2>
    <div class="row px-xl-5 pb-3">
        @foreach($scategory as $val)
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <a class="text-decoration-none" href="{{url('subcategory/'.$val->slug)}}">
                <div class="cat-item d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style=" height: 100px;">
                        <img class="img-fluid" src="img/cat-1.jpg" alt="">
                    </div>
                    <div class="flex-fill justify-content-center d-flex">
                        <h6>{{ $val->subcategory }}</h6>
                        <small class="text-body"></small>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@include('layouts.inc.footer')
@endsection
