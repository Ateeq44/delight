<style>
    table tr td{
        font-size: 17px;
    }
</style>
@extends('layouts.front')

@section('title')
My Order
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-color container text-white border-top">
    <div class="container">
        <h5 class="mb-0" style="
        font-size: 20px;">
            <a class="" href="{{url('/')}}">
                Home
            </a> /
            <a class="" href="{{url('my_order')}}">
                My Order
            </a>

        </h5>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>My Orders</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tracking No.</th>
                                <th>Date</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{$item->tracking_no}}</td>
                                <td>{{date_format($item->created_at, 'd-m-Y')}}</td>
                                <td>${{$item->total_price}}</td>
                                <td>{{$item->status == '0' ? 'Pending' : 'Delivered'}}</td>
                                <td>
                                    <a style="
                                    font-size: 15px;
                                " href="{{url('view_order/'.$item->id)}}" class="btn d-block text-white bg-color">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@include('layouts.inc.footer')
@endsection

