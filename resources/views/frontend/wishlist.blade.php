@extends('layouts.front')

@section('title')
Wishlist
@endsection

@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Wishlist</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
@if(@$cartitem->count()> 0)
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        {{-- <th>size</th>
                            <th>Color</th> --}}
                            <th>Quantity</th>
                            <th>Add Cart</th>
                            <th>Remove</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">
                        @foreach ($wishlist as $item)
                        @php
                        $images = json_decode($item->wishlistproducts->image);
                        @endphp
                        <tr>
                            <td class="align-middle"><img src="{{asset('upload/product/'.$images[0])}}" alt="" style="width: 50px;">{{$item->wishlistproducts->name}}</td>
                            <td class="align-middle">${{$item->wishlistproducts->selling_price}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <button type="button" class="btn btn-primary addTocartBtn"  style="font-size: 15px;" value="{{$item->prod_id}}" style="width:155px;">
                                    <i class="fa-solid fa-shopping-cart" ></i>
                                    Add To Cart
                                </button>
                            </td>

                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times " data-toggle="modal" data-target="#exampleModalCenter"></i></button></td>

                        </tr>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Wishlist Item Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Do you want to delete this item.
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-danger"  href="{{url('wishlist-delete/'.$item->id)}}">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12 d-flex justify-content-center">
                <h5>Your Wishlist is Empty <a href="{{ url('shop') }}" class="btn btn-primary">Return to Shop</a></h5>
            </div>
        </div>
    </div>
    @endif
    <!-- Cart End -->

    @include('layouts.inc.footer')
    @endsection



    @section('script')
    <script>

        $(document).ready(function() {
            $('.addTocartBtn').click(function(e){
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                // console.log(product_qty);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "GET",
                    url: "{{ url('add-to-cart')}}"+"/",
                    data: {
                        'product_id' : product_id,
                        'product_qty' : product_qty,
                    },
                    success: function (response,status){
                        swal(response,status);

                    },
                });
            });

            $(document).on("click", ".increment-btn-qty", function () {
                var inc_value=$(this).next().val();
                var value = parseInt(inc_value) + 1;
                $(this).next().val(value);
            });
            $(document).on("click", ".decrement-btn-qty", function () {
                var inc_value=$(this).prev().val();
                var value = parseInt(inc_value) - 1;
                if(value > 0) {
                    $(this).prev().val(value);
                }
            });

            function loadcart()
            {

                $.ajax({
                    method: "GET",
                    url: "{{ url('load-wishlist-data')}}"+"/",
                    success: function(response){
                        $('.wishlist-count').html('');
                        $('.wishlist-count').html('response.count');
                        console.log(response.count);
                    }
                })

            }

        });


    </script>
    @endsection

