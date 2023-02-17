<style>
    /* rating */
    .rating-css div {
        color: #ffe400;
        font-size: 30px;
        font-family: sans-serif;
        font-weight: 800;
        text-align: center;
        text-transform: uppercase;
        padding: 20px 0;
    }
    .rating-css input {
        display: none;
    }
    .rating-css input + label {
        font-size: 60px;
        text-shadow: 1px 1px 0 #8f8420;
        cursor: pointer;
    }
    .rating-css input:checked + label ~ label {
        color: #b4afaf;
    }
    .rating-css label:active {
        transform: scale(0.8);
        transition: 0.3s ease;
    }
    .checked{
        color: #ffe400;
    }
    /* End of Star Rating */
</style>
@extends('layouts.front')

@section('title', $product->name)

@section('content')
<section class="product-details spad">
    <div class="container">
        <div class="row prod_data">
            <div class="col-lg-5 col-md-5">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        @php
                        $images = json_decode($product->image);
                        @endphp
                        <img class="product__details__pic__item--large" style="width: -webkit-fill-available;" src="{{asset('upload/product/'.$images[0])}}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        @foreach ($images as $item)
                        <img style="width: -webkit-fill-available;" data-imgbigurl="{{asset('upload/product/'.$item)}}"
                        src="{{asset('upload/product/'.$item)}}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-lg-7 col-md-7">
                <div class="product__details__text">

                    <?php
                    $ratingAvg = $rating_value;
                    ?>
                    <p class="">{{$product->name}}</p>
                    <p>
                        @for($i = 0; $i < 5; $i++)

                        <?php
                        $checkstar =$rating_value - $i;
                        ?>

                        @if($checkstar >= 1 )

                        <small class="fas fa-star checked"></small>

                        @elseif( $checkstar < 1 && $checkstar > 0)

                        <small class="fas fa-star-half-alt checked"></small>

                        @else
                        <small class="far fa-star"></small>
                        @endif
                        @endfor
                        <span> {{$rating->count()}} review</span>
                    </p>
                    <br><br>
                    <div class="product__details__price">Selling Price: ${{$product->selling_price}}</div>
                    <div class="product__details__price">Original Price: <strike>${{$product->original_price}}</strike> </div>
                    {{-- <p>
                        {{$product->description}}
                    </p> --}}
                    <div class="product__details__quantity">
                        <input type="hidden" value="{{$product->id}}" class="prod_id">

                        <div class="quantity">
                            <div class="pro-qty">
                                <span class="dec qtybtn">-</span>
                                <input type="text" class="quantity qty-input" value="1">
                                <span class="inc qtybtn">+</span>
                            </div>
                        </div>
                        @if ($product->qty > 0)
                        <a href="#" class="primary-btn addTocartBtn" onClick="window.location.href=window.location.href">ADD TO CARD</a>
                        @endif
                        <a href="#" class="pri-btn addToWishlist">
                            <i class="fa-solid fa-heart"></i>
                        </a>

                        <ul>
                            <li><b>Availability</b>
                                @if ($product->qty > 0)
                                <span class="badge text-white bg-color">In Stock</span>
                                @else
                                <span class="badge text-white badge-danger">Out of Stock</span>
                                @endif
                            </li>
                            <li><b class="mr-1">Shipping</b><span><i class="fa-solid fa-file-invoice-dollar mr-2"></i> Trade AssuranceProtects your Delight.com orders.</span>

                            </li>

                            <li><b></b>
                                <span>
                                    <i class="fa-solid fa-circle-check mr-2"></i>
                                    On-time Dispatch Guarantee.
                                    <a data-toggle="tooltip" data-placement="right" title="On-time dispatch is guaranteed or you will be eligible to claim platform compensation.">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </span>
                            </li>
                            <li><b></b> <span><i class="fa-solid fa-circle-check mr-2"></i> Refund Policy
                                <a data-toggle="tooltip" data-placement="right" title="If the shipment is delayed or product quality differs from what are specified in the online order, you can claim for a refund.
                                Quick refund: If you can apply for a refund within two hours of making a payment, you will receive a refund immediately.">
                                <i class="fa-solid fa-circle-info"></i>
                            </a>
                        </span></li>
                        <li class="mt-5"><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container my-5">
    <div class="col-lg-12">
        <div class="product__details__tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="false">Description</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="true">Reviews</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="tabs-1" role="tabpanel">
                    <div class="product__details__tab__desc">
                        <h4 class="mb-2 font-weight-bold">Essential Details</h4>
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div>
                </div>
                <div class="tab-pane active" id="tabs-3" role="tabpanel">
                    <div class="product__details__tab__desc">

                        @if($verified_purchase->count() > 0)

                        <h4 class="font-weight-bold">Review This Product</h4>

                        <button type="button" class="btn bg-color text-white mt-3 py-2" data-toggle="modal" data-target="#myModal">
                            Add your Review
                        </button>
                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title ">Rate and Review</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{url('add-rating')}}" method="POST">
                                            @csrf
                                            <div class="rating-css">
                                                <label for="message" class="mt-3 ">Rating</label>
                                                <div class="star-icon">
                                                    <div class="rating">
                                                        <input type="radio" name="rating" value="1" id="1"><label for="1"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating" value="2" id="2"><label for="2"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating" value="3" id="3"><label for="3"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating" value="4" id="4"><label for="4"><i class="fa-solid fa-star"></i></label>
                                                        <input type="radio" name="rating" value="5" id="5"><label for="5"><i class="fa-solid fa-star"></i></label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="message" class="">Your Review</label>
                                                <textarea id="message" cols="30" rows="3" name="review" class="form-control" required></textarea>

                                            </div>

                                            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}" class="">
                                            <div class="form-group mb-0">

                                                <button  class="btn bg-color text-white outline-none border-none" type="submit" onclick="handleSubmit()">Submit</button>


                                            </div>
                                        </form>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                    <?php
                    $ratingAvg = $rating_value;
                    // dd($ratingAvg);
                    ?>
                    <p class="mt-5">
                        @for($i = 0; $i < 5; $i++)

                        <?php
                        $checkstar =$rating_value - $i;
                        ?>

                        @if($checkstar >= 1 )

                        <small class="fas fa-star checked"></small>

                        @elseif( $checkstar < 1 && $checkstar > 0)

                        <small class="fas fa-star-half-alt checked"></small>

                        @else
                        <small class="far fa-star"></small>
                        @endif
                        @endfor
                        <span> {{$rating->count()}} review</span>
                    </p>

                    <hr>
                    <h4>Most relevant reviews</h4>
                    <div class="mt-3">
                        @foreach ($review as $item)
                        <span class="review-item-component-wrapper mt-5">
                            <div class="review-header-container">
                                <div class="reviewer-details">
                                    <span class="tbody-5 co-grey-1100 username">
                                        <p class="f-size" style="font-size: 20px;">
                                            {{ $item->user->name}}
                                        </p>
                                    </span>
                                </div>
                            </div>
                            <div class="review-details">
                                <div class="flex d-flex m-t-20">
                                    <div class=" orca-rating color-yellow tbody-6">
                                        <div class="stars">
                                            <span class="nFghBOe orca-star" style="width:15px;height:15px" aria-hidden="true">
                                                @php $user_rated = $item->stars_rating @endphp
                                                @for($i = 1; $i <= $user_rated; $i++)
                                                <small class="fa fa-star checked" style="font-size: 14px;"></small>
                                                @endfor
                                                @for($j = $user_rated+1; $j <= 5; $j++)
                                                <small class="fa fa-star" style="font-size: 14px;"></small>
                                                @endfor
                                            </span>
                                        </div>
                                    </div>
                                    <span class="inline-divider ">
                                    </span>
                                    <time class="text-body-2 ml-4" style="font-size: 14px;">{{date_format($item->created_at, 'd-m-Y')}}</time>
                                </div>
                                <div class="review-description m-b-0">
                                    <div> <p>{{$item->review}}</p></div>
                                </div>
                            </div>
                        </span>
                        @endforeach
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>


</div>

<section class="related-product mt-5">
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($relatedproduct as $item)
            <div class="col-md-3 mb-3">
                <a class="text-dark" href="{{url('view-category/'.$item->category->slug.'/'.$item->slug)}}">
                    <div class="card">
                        <img class="w-100" src="{{asset('upload/product/'.$images[0])}}" alt="">
                        <div class="card-body">
                            <h6 class="name" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;text-align: left !important; font-size:15px;">{{$item->name}}</h6>
                            <h5 style="font-size: 25px; text-align: center; font-weight: bold; margin-top:20px;">${{$item->selling_price}}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

</section>
@include('layouts.inc.footer')
@endsection
@section('script')
<script>
    $(document).ready(function(){

        $('.addTocartBtn').click(function(e){
            e.preventDefault();
            var product_id = $(this).closest('.prod_data').find('.prod_id').val();
            var product_qty = $(this).closest('.prod_data').find('.qty-input').val();
            alert
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
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    // alert(errorThrown)
                    if(errorThrown == 'Unauthorized'){
                        swal('Login to continue')
                    }
                }

            });
            // 45
        });

        $('.addToWishlist').click(function (e) {
            // e.preventDefault();
            var product_id = $(this).closest('.prod_data').find('.prod_id').val();

            console.log(product_id);
            $.ajax({
                method : "get",
                url : "{{url('/add-to-wishlist')}}",
                data :{
                    'prod_id' : product_id,
                },
                success: function (response){
                    swal(response.status);
                }
            })
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



    });



    function starry (instance) {
        // (A) SET DEFAULTS
        if (instance.max === undefined) { instance.max = 5; }
        if (instance.now === undefined) { instance.now = 0; }
        if (instance.now > instance.max) { instance.now = instance.max; }
        if (instance.disabled === undefined) { instance.disabled = false; }

        // (B) GENERATE STARS
        instance.target.classList.add("starwrap");
        for (let i=1; i<=instance.max; i++) {
            // (B1) CREATE HTML STAR
            let s = document.createElement("div");
            s.className = "star";
            instance.target.appendChild(s);

            // (B2) HIGHLIGHT STAR
            if (i <= instance.now) { s.classList.add("on"); }

            if (!instance.disabled) {
                // (B3) ON MOUSE OVER
                s.onmouseover = () => {
                    let all = instance.target.getElementsByClassName("star");
                    for (let j=0; j<all.length; j++) {
                        if (j<i) { all[j].classList.add("on"); }
                        else { all[j].classList.remove("on"); }
                    }
                };

                // (B4) ON CLICK
                if (instance.click) { s.onclick = () => { instance.click(i); }; }
            }
        }

        // (C) GET NUMBER OF SELECTED STARS
        instance.target.getstars = () => {
            return instance.target.querySelectorAll(".on").length;
        };
    }

    starry({
        // (C1) REQUIRED
        target: document.getElementById("demo"),
        // (C2) OPTIONAL
        max: 5,
        now: 3,
        // disabled: true,
        click : (stars) => { alert(stars); }
    });

    // (D) TO GET NUMBER OF STARS PROGRAMMATICALLY
    var stars = document.getElementById("demo").getstars();
    console.log(stars);




</script>
@endsection
