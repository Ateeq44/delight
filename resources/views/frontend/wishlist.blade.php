@extends('layouts.front')

@section('title')
Wishlist
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-color container text-white border-top">
    <div class="container">
            </div>
        <h5 class="mb-0" style="
        font-size: 20px;">
            <a class="" href="{{url('/')}}">
                Home
            </a> /
            <a class="" href="{{url('wishlist')}}">
                Wishlist
            </a>

        </h5>
    </div>
</div>

<section class="shoping-cart spad">
    @if ($wishlist->count() > 0)
    <div class="container">
        <div class="row product_data">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Stock</th>
                                <th>Price</th>
                                {{-- <th>Total</th> --}}
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($wishlist as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                     @php
                                    $images = json_decode($item->wishlistproducts->image);
                                    @endphp
                                    <img style="width: 100px;" src="{{asset('upload/product/'.$images[0])}}" alt="">
                                    <p>{{$item->wishlistproducts->name}}</p>
                                </td>
                                <td class="shoping__cart__price">
                                    @if ($item->wishlistproducts->qty > 0)
                                    <label class="badge bg-success text-white  ">In Stock</label>
                                    @else
                                    <label class="badge bg-danger text-white ">Out of Stock</label>
                                    @endif
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$item->wishlistproducts->selling_price}}
                                </td>
                                @if ($item->wishlistproducts->qty > 0)
                                <td class="shoping__cart__quantity">
                                    <input type="hidden" class="prod_id" value="{{$item->prod_id}}" name="">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                        <span class="dec qtybtn"></span>
                                            <input type="text" class="qty-input" name="quantity" value="1">
                                            <span class="inc qtybtn"></span>
                                            </div>
                                        </div>
                                    </td>
                                    

                                    <td class="shoping__cart__total">
                                        <button type="button" class="btn bg-color text-white addTocartBtn"  style="font-size: 15px;" value="{{$item->prod_id}}" style="width:155px;">
                                            <i class="fa-solid fa-shopping-cart" ></i>
                                            Add To Cart
                                        </button>
                                    </td>
                                        @endif

                                    <td class="shoping__cart__item__close">
                                        <a href="{{url('wishlist-delete/'.$item->id)}}">
                                            <i class="fa-solid fa-trash" style="    font-size: 35px;
                                            margin-left: 25px; color:#dd2222;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{url('shop')}}" class="btn bg-color text-white"  style="font-size: 15px;">CONTINUE SHOPPING</a>
                    </div>
                </div>


            </div>
        </div>

        @else
        <div class="container">
            <div class="card-body">
                <h1 class="text-center" >Your <i class="fa-solid fa-heart"></i> Wishlist is empty</h1>
            </div>

                <a href="{{url('shop')}}" class="btn bg-color text-white float-end py-3 mt-4" style="font-size: 15px;">Continue to shopping</a>
        </div>
        @endif
    </section>
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
                    success: function (response){
                        swal(response.status);

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

