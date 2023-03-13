@extends('layouts.front')

@section('title')
My Orders
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h1>Thank you {{$order->lname}} {{$order->lname}}</h1>
            <h4>Your Order #{{$order->tracking_no}}</h4>
            <p>Thank you for your recent purchase. We are pleased to confirm that your order has been received and is currently being processed.</p>
            <p>If you have any questions or comments about the purchase, please don't hesitate to reach out to us. We welcome any and all feedback, as it helps us to improve our offerings and provide a better experience for our customers.
                <p>
                Thank you for your time and consideration, and we look forward to hearing from you soon.</p>
            </p>
        </div>
        
        <div class="col-md-7">
            <div class="shadow rounded p-3">
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
                                <img width="50px" src="{{asset('upload/product/'.$item->orderproducts->image)}}" alt="">
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('layouts.inc.footer')
@endsection
