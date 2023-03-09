@extends('layouts.front')

@section('title')
Welcome To Delight
@endsection

@section('content')

<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Products</span></h2>

    <div class="row px-xl-5">
        @foreach($scategory as $item)
        @php
        $images = json_decode($item->image);
        @endphp
        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <div class="product-item bg-light mb-4">
                <div class="product-img position-relative overflow-hidden">
                    <img class="img-fluid w-100 pt-5" src="{{asset('upload/product/'.$images[0])}}" alt="">
                    <div class="product-action">
                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                        <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                        <a href="{{url('view-category/'.$item->category->slug.'/'.$item->slug)}}" class="btn btn-outline-dark btn-square" href=""><i class="far fa-eye"></i></a>
                    </div>
                </div>
                <div class="text-center py-4">
                    <a class="h6 text-decoration-none text-truncate" href=""></a>
                    <p class="p-3">{{ $item->name }}</p>
                    <div class="d-flex align-items-center justify-content-center mt-2">
                        <h5>${{ $item->selling_price }}</h5>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Products End -->   

@include('layouts.inc.footer')
@endsection

