@extends('layouts.admin')

@section('title')
Orders Details
@endsection

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-white" style="background-color:#57b846;">
                    <h4>
                        Order View
                        <a href="{{url('orders')}}" class="btn btn-primary float-right">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 orderdetails">
                            <h5 class="mb-4">Shipping Details</h5>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border py-2 px-3">{{$orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border py-2 px-3">{{$orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border py-2 px-3">{{$orders->email}}</div>
                            <label for="">Contact No.</label>
                            <div class="border py-2 px-3">{{$orders->phone}}</div>
                            <label for="">Shipping Address</label>
                            <div class="border py-2 px-3">
                                {{$orders->address}}<br>
                                {{$orders->city}}<br>
                                {{$orders->state}}<br>
                                {{$orders->country}}
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border py-2 px-3">{{$orders->zipcode}}</div>

                        </div>
                        <div class="col-md-7">
                            <h5 class="mb-4">Order Details</h5>
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
                                    @foreach ($orders->orderitem as $item)
                                    <tr>
                                        <td>{{$item->orderproducts->name}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <img width="50px" src="{{asset('upload/product/'.$item->orderproducts->image)}}" alt="">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4>Payment Info: {{$orders->payment_method}}</h4>

                            {{-- @if ($orders->payment_id > 0) --}}
                            <h4>Payment ID: {{$orders->payment_id}}</h4>
                            {{-- @endif --}}
                            <h1 class="fa-2x mt-3 font-weight-bold">Grand Total: ${{$orders->total_price}}</h1>

                            <h4 class="mt-5 font-weight-bold">Order Status</h4>
                            <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                @csrf
                                <select class="form-select corner" name="status" style="padding: 7px 40px; border-radius: 5px;">
                                    <option {{$orders->status == '0'? 'selected' : 'Placed' }} value="0">Placed</option>
                                    <option {{$orders->status == '1'? 'selected' : 'Accepted' }} value="1">Accepted</option>
                                    <option {{$orders->status == '2'? 'selected' : 'Picked' }} value="2">Packed</option>
                                    <option {{$orders->status == '3'? 'selected' : 'Shipped' }} value="3">Shipped</option>
                                    <option {{$orders->status == '4'? 'selected' : 'Delivered' }} value="4">Delivered</option>
                                </select>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
