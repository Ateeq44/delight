<style>
    .scrollmenu {

        overflow: auto;
        white-space: nowrap;
    }
    .fa-2x{
        font-size: 20px !important;
    }

</style>
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>View Product</h4>
        </div>
        <div class="card-body scrollmenu">

            <table  class="table table-bordered scrollmenu" cellspacing="0" width="100%">
                <thead>
                    @php
                    $i = 1;
                    @endphp
                    <tr>
                        <th>Sr#</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Product Title</th>
                        <th>Selling Price</th>
                        <th>Original Price</th>
                        <th>Quanity</th>
                        <th>Shipping Charges</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($product as $item)
                    @php
                    $images = json_decode($item->image);
                    @endphp
                    <tr>
                        <td>{{$i++}}</td>
                        <td><img  style="width: 100px;"  src="{{ asset('/upload/product').'/'.$images[0]}}"></td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->name}}</td>
                        <td>${{$item->selling_price}}</td>
                        <td>${{$item->original_price}}</td>
                        <td>{{$item->qty}}</td>
                        <td>${{$item->tax}}</td>
                        <td>{{$item->created_at->format('d-M-Y')}}</td>
                        <td>{{$item->status}}</td>

                        <td>

                            <a href="{{url('product-delete/'.$item->id)}}" class="btn btn-danger d-flex py-2 fa-2x  px-5 align-items-center justify-content-center">Delete</a>
                            <a href="{{url('product-edit/'.$item->id)}}" class="btn btn-primary d-flex py-2 fa-2x px-5 align-items-center justify-content-center">Edit</a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
@section('script')

$(document).ready(function () {
    $('#dtHorizontalExample').DataTable({
        "scrollX": true
    });
    $('.dataTables_length').addClass('bs-select');
});

@endsection
