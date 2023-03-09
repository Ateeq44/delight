@extends('layouts.front')

@section('title', $product->name)

@section('content')

<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="#">Home</a>
                <a class="breadcrumb-item text-dark" href="#">Shop</a>
                <span class="breadcrumb-item active">Shop Detail</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

@php
$images = json_decode($product->image);
@endphp
<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5 prod_data">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    @foreach ($images as $item)
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{asset('upload/product/'.$item)}}" alt="Image">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3>{{$product->name}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <?php
                        $ratingAvg = $rating_value;
                        ?>
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
                    </div>
                    <small class="pt-1">({{$rating->count()}} Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">${{ $product->selling_price }}</h3>
                <p class="mb-4">{!! $product->description !!}</p>
                <div class="d-flex mb-3">
                    <strong class="text-dark mr-3">Sizes:</strong>
                    @php
                    $colors = explode(",", $product->color);
                    $sizes = explode(",", $product->size);
                    @endphp
                    @foreach($sizes as $item)
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control size" id="size-1" name="size" value="{{ $item }}"> 
                        <span class="ml-1">{{ $item }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex mb-4">
                    <strong class="text-dark mr-3">Colors:</strong>
                    @foreach($colors as $item)
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control color" id="size-1" name="color" value="{{ $item }}"> 
                        <span class="ml-1">{{ $item }}</span>
                    </div>
                    @endforeach
                </div>
                @if ($product->qty > 0)
                <span class="badge badge-info text-white">In Stock</span>
                @else
                <span class="badge text-white badge-danger">Out of Stock</span>
                @endif
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary border-0 text-center qty-input" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" value="{{$product->id}}" class="prod_id">

                    <button class="btn btn-primary addTocartBtn px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To
                    Cart</button>
                    <a href="#" class="pri-btn addToWishlist">
                        <i class="fa-solid fa-heart fa-2x ml-3"></i>
                    </a>
                </div>

                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews ({{$rating->count()}})</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{!! $product->description !!}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review for "{{$product->name}}"</h4>
                                @foreach ($review as $item)

                                <div class="media mb-4">
                                    {{-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;"> --}}
                                    <div class="media-body">
                                        <h6>{{ $item->user->name}}<small> - {{date_format($item->created_at, 'd-m-Y')}}</small></h6>

                                        <?php
                                        $ratingAvg = $rating_value;
                                        ?>

                                        <div class="text-primary mb-2">

                                            @php $user_rated = $item->stars_rating @endphp
                                            @for($i = 1; $i <= $user_rated; $i++)
                                            <small class="fa fa-star checked" style="font-size: 14px;"></small>
                                            @endfor
                                            @for($j = $user_rated+1; $j <= 5; $j++)
                                            <small class="fa-regular fa-star" style="font-size: 14px;"></small>
                                            {{-- <small class="fa fa-star" ></small> --}}
                                            @endfor
                                            
                                        </div>
                                        <p>{{$item->review}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-md-6"> 
                             <div class="product__details__tab__desc">

                                @if($verified_purchase->count() > 0)

                                <h4 class="font-weight-bold">Review This Product</h4>

                                <button type="button" class="btn btn-primary text-white mt-3 py-2" data-toggle="modal" data-target="#myModal">
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

                                                        <button  class="btn btn-primary text-white outline-none border-none" type="submit" onclick="handleSubmit()">Submit</button>


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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Shop Detail End -->


<!-- Products Start -->
{{-- <div class="container-fluid py-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
                <div class="product-item bg-light">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>$123.00</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Products End -->

@include('layouts.inc.footer')
@endsection
@section('script')
<script>
    $(document).ready(function(){

        $('.addTocartBtn').click(function(e){
            e.preventDefault();
            var product_id = $(this).closest('.prod_data').find('.prod_id').val();
            var product_qty = $(this).closest('.prod_data').find('.qty-input').val();
            var color = $(this).closest('.prod_data').find('.color:checked').val();
            var size = $(this).closest('.prod_data').find('.size:checked').val();
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
                    'color' : color,
                    'size' : size,
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
