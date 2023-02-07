@extends('layouts.admin')

@section('title')
Order Packed
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Packed</h4>
                    <a href="{{url('orders')}}"  class="btn btn-primary float-right">New Order</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking No.</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{date_format($item->created_at, 'd-m-Y')}}</td>
                                <td>{{$item->tracking_no}}</td>
                                <td>${{$item->total_price}}</td>
                                <td>{{$item->status == '2' ? 'Packed' : ''}}</td>
                                <td>
                                    <a href="{{url('order-view/'.$item->id)}}" class="btn btn-primary d-block">View</a>
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
@endsection
