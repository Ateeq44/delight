@extends('layouts.front')

@section('title')
Shop
@endsection

@section('content')

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mt-3 col-md-5">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <span>All departments</span>
                        <i class="fa fa-bars float-right mt-2 text-white"></i>

                    </div>
                    <ul style="">
                        @foreach ($all_category as $item)
                        <li><a href="{{url('view-category/'.$item->slug)}}">{{$item->name}}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">

                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                   <h6><span class="" style="font-size: 20px;">{{$all_product->count()}}</span> Products found</h6>                                 </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        @foreach ($all_product as $item)
                        <div class="col-md-4 mb-3">
                            <a class="text-dark" href="{{url('view-category/'.$item->category->slug.'/'.$item->slug)}}">
                                <div class="card">
                                    @php
                                    $images = json_decode($item->image);
                                    @endphp
                                    <img class="w-100" src="{{asset('upload/product/'.$images[0])}}" alt="Product Image">
                                    <div class="card-body">
                                        <h6 class="name" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;text-align: left !important; font-size:15px;">{{$item->name}}</h6>
                                        <h5 style="font-size: 25px; text-align: center; font-weight: bold; margin-top:20px;">${{$item->selling_price}}</h5>
                                    </div>
                                    {{-- <p>
                                        @for($i = 0; $i < 5; $i++)

                                        <?php
                                        // $checkstar =$rating_value - $i;
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
                                    </p> --}}
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    {{ $all_product}}
                </div>
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

            });

            $('.addToWishlist').click(function (e) {
                // e.preventDefault();
                var product_id= $(this).val();
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
    </script>
    @endsection
