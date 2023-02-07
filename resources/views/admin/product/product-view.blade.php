@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4 class="font-weight-bold py-2">{{$product->name}}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @php
                        $iamges = jason_decode($product->image);
                    @endphp
                    <img class="w-100"  src="{{ asset('/upload/product').'/'.$image[0]}}">
                </div>
                <div class="col-md-8">
                    <h2><h4 class="font-weight-bold">Category:</h4> {{$product->category->name}}</h2>
                    <p class="font-weight-bold"><h4 class="font-weight-bold">Slug:</h4>  {{$product->slug}}</p>
                    <p class="font-weight-bold"><h4 class="font-weight-bold">Original Price:</h4>  ${{$product->original_price}}</p>
                    <p class="font-weight-bold"><h4 class="font-weight-bold">Selling Price:</h4>  ${{$product->selling_price}}</p>
                    <p class="font-weight-bold"><h4 class="font-weight-bold">tax:</h4>  ${{$product->tax}}</p>
                    <p class="font-weight-bold"><h4 class="font-weight-bold">Quantity:</h4>  ${{$product->qty}}</p>
                </div>

                <div class="col-md-12 mt-5">
                    <p class="font-weight-bold"><h4 class="font-weight-bold">Essential Details:</h4>  {{$product->description}}</p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
