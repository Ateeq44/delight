@extends('layouts.front')

@section('title')
Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-color container text-white border-top">
    <div class="container">
        <h5 class="mb-0"  style="
        font-size: 20px;">
        <a class="" href="{{url('/')}}">
            Home
        </a> /
        <a class="" href="{{url('cart')}}">
            Cart
        </a>

    </h5>
</div>
</div>

<section class="shoping-cart spad">
    @if ($cartitem->count()> 0)
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cartitem as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    @php
                                    $images = json_decode($item->cartproducts->image);
                                    @endphp
                                    <img style="width: 100px;" src="{{asset('upload/product/'.$images[0])}}" alt="">
                                    <p>{{$item->cartproducts->name}}</p>
                                </td>
                                <td class="shoping__cart__price">
                                    ${{$item->cartproducts->selling_price}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <a href="{{url('increase/'.$item->id)}}">
                                                <span class="dec qtybtn">-</span>
                                            </a>
                                            <input type="text" class="quantity qty-input" value="{{$item->prod_qty}}">
                                            <a href="{{url('decrease/'.$item->id)}}">
                                                <span class="inc qtybtn">+</span>
                                            </a>
                                        </div>

                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    @php
                                    @$totalprice = $item->cartproducts->selling_price * $item->prod_qty;
                                    @endphp
                                    ${{@$totalprice}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <div data-toggle="modal" data-target="#exampleModalCenter">
                                        <i class="fa-solid fa-trash"  style="cursor: pointer; font-size: 25px; color:#dd2222;"></i>
                                    </div>
                                </td>
                            </tr>
                            @php
                            @$total += $item->cartproducts->selling_price * $item->prod_qty;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Cart Item Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete this item.
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger"  href="{{url('cart-delete/'.$item->id)}}">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="{{url('shop')}}" class="btn bg-color text-white"  style="font-size: 15px;">CONTINUE SHOPPING</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span>${{@$total}}</span></li>
                    </ul>
                    <a href="{{url('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="card-body">
            <h1 class="text-center" >Your <i class="fa fa-cart-plus" aria-hidden="true"></i> cart is empty</h1>
        </div>

        <a href="{{url('shop')}}" class="btn bg-color text-white py-3 mt-4 float-end"  style="font-size: 15px;">Continue to shopping</a>
    </div>
    @endif
</section>

@include('layouts.inc.footer')
@endsection

@section('script')
<script>
    $( "#book" ).load(function() {
        // Handler for .load() called.
    });

    $(document).load(function() {

        $('.addtoCartbtn').click(function (e) {
            e.preventDefault();
            var product_id= $(this).closest('.product_data').find('.prod_id').val();
            var product_qty= $(this).closest('.product_data').find('.qty-input').val();
            alert(product_id);
            alert(product_qty);

        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });





        $('.quantitychange').click(function (e) {
            e.preventDefault();
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var qty = $(this).closest('.product_data').find('.qty-input').val();
            data ={
                'prod_id' : prod_id,
                'peod_qty' : qty
            }

            $.ajex({
                method = "POST",
                url = "update_cart",
                data = "data",
                success: function (response){
                    alert(response);
                }
            })
        });
    });




    $(document).ready(function(){

        var quantitiy=0;
        $('.quantity-right-plus').click(function(e){

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if(quantity>0){
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
@endsection

