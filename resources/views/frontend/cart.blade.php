@extends('layouts.front')

@section('title')
Cart
@endsection

@section('content')
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shopping Cart</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Cart Start -->
@if(@$cartitem->count()> 0)
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-9 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>size</th>
                        <th>Color</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>

                <tbody class="align-middle">
                    @foreach ($cartitem as $item)
                    @php
                    $images = json_decode($item->cartproducts->image);
                    @endphp
                    <tr>
                        <td class="align-middle"><img src="{{asset('upload/product/'.$images[0])}}" alt="" style="width: 50px;">{{$item->cartproducts->name}}</td>
                        <td class="align-middle">${{$item->cartproducts->selling_price}}</td>
                        <td class="align-middle">{{$item->size}}</td>
                        <td class="align-middle">{{$item->color}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{$item->prod_qty}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        @php
                        @$totalprice = $item->cartproducts->selling_price * $item->prod_qty;
                        @endphp
                        <td class="align-middle">${{@$totalprice}}</td>
                        <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times " data-toggle="modal" data-target="#exampleModalCenter"></i></button></td>
                    </tr>
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
                    @php
                    @$total += $item->cartproducts->selling_price * $item->prod_qty;
                    @$tax += $item->cartproducts->tax;
                    @$total_price =  $total + $tax;
                    @endphp
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="col-lg-3">
            <form class="mb-30" action="">
                <div class="input-group">
                    <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>
            </form>
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6>${{@$total}}</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">${{ @$tax }}</h6>

                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>${{ @$total_price }}</h5>
                    </div>

                    <a href="{{url('checkout')}}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkou</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12 d-flex justify-content-center">
            <h5>Your Cart is Empty <a href="{{ url('shop') }}" class="btn btn-primary">Return to Shop</a></h5>
        </div>
    </div>
</div>
@endif
<!-- Cart End -->

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
                success: function (response, status){
                    alert(response , status);
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

