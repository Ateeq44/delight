@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-color text-white ">
                    <h4 style="
                    display: flex;
                    align-items: center;
                    justify-content: space-between;">
                    Order View
                    <a href="{{url('my_order')}}" class="btn btn-lg btn-warning float-right">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="row" style="font-size: 15px;">
                    <div class="col-md-5 orderdetails">
                        <h5 class="mb-4" style="font-size: 15px;">Shipping Details</h5>
                        <hr>
                        <label for="">First Name</label>
                        <div class="border px-3 py-2">{{$order->fname}}</div>
                        <label for="">Last Name</label>
                        <div class="border px-3 py-2">{{$order->lname}}</div>
                        <label for="">Email</label>
                        <div class="border px-3 py-2">{{$order->email}}</div>
                        <label for="">Contact No.</label>
                        <div class="border px-3 py-2">{{$order->phone}}</div>
                        <label for="">Shipping Address</label>
                        <div class="border px-3 py-2">
                            {{$order->address}}<br>
                            {{$order->city}}<br>
                            {{$order->state}}<br>
                            {{$order->country}}
                        </div>
                        <label for="">Zip Code</label>
                        <div class="border px-3 py-2">{{$order->zipcode}}</div>
                    </div>
                    <div class="col-md-7">
                        <h5 class="mb-4" style="font-size: 15px;">Order Details</h5>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderitem as $item)
                                <tr>
                                    <td>{{$item->orderproducts->name}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>${{$item->price}}</td>
                                    <td>
                                        @php
                                        $images = json_decode($item->orderproducts->image);
                                        @endphp
                                        <img width="50px" src="{{asset('upload/product/'.$images[0])}}" alt="">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <h4 class="mt-3 font-weight-bold fa-2x"  style="color:#57b846;">Grand Total: ${{$order->total_price}}</h4>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
@include('layouts.inc.footer')
@endsection
