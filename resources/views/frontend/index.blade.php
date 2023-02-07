@extends('layouts.front')

@section('title')
Welcome To Delight
@endsection

@section('content')
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 mt-2">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <span>All Category</span>
                        <i class="fa fa-bars float-right mt-2 text-white"></i>

                    </div>
                    <ul style="">
                        @foreach ($all_category as $item)
                        <li><a href="{{url('view-category/'.$item->slug)}}">{{$item->name}}</a></li>

                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-9 mt-2">
                <!-- <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{url('/search')}}" method="GET">
                            @csrf
                            <div class="hero__search__categories">
                                All Categories
                            </div>
                            <input type="search" name="search_product" placeholder="What do you need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div> -->
                <div class="hero__item set-bg" data-setbg="public/images/header.JPG" style="background-image: url(&quot;public/images/header.JPG&quot;);">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="categories" >
    <div class="container">
        <div class="section-title">
            <h2 class="text-center" style="font-size: 40px;">Recent Category</h2>
        </div>
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($trending_category as $item)
                <a href="{{url('view-category/'.$item->slug)}}">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('upload/category/'.$item->image)}}">
                        </div>
                        <p>{{$item->name}}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="categories" >
    <div class="container">
        <div class="section-title">
            <h2 class="text-center mt" style="font-size: 40px;">Recent Products</h2>
        </div>
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($feature_product as $item)
                @php
                $images = json_decode($item->image);
                @endphp
                <a href="{{url('view-category/'.$item->category->slug.'/'.$item->slug)}}">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('upload/product/'.$images[0])}}">
                        </div>
                        <p>${{$item->selling_price}}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{-- <div class="banner"  >
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img class="w-100" src="public/images/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img class="w-100" src="public/images/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div> --}}
<section class="from-blog spad"  >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2 style="font-size: 40px; ">From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($blogp as $item)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img class="w-100"  src="{{asset('upload/blog/'.$item->image)}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fas fa-calendar-week mr-2"></i>
                                {{date_format($item->created_at,"d-m-Y")}}
                            </li>

                        </ul>
                        <h5><a style="display: -webkit-box;
                        -webkit-line-clamp: 1;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        text-align: left !important;" href="#">{{$item->name}}</a></h5>
                        <p style="display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        text-align: left !important;">{{$item->blog}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@include('layouts.inc.footer')
@endsection

@section('script')

<script>

    // var availableTags = [];

    // $.ajax({
    //     method: "GET",
    //     url: "{{ url('search_product')}}"+"/",
    //     success: function (response){
    //         // swal(response.status);
    //         console.log(response);

    //     },
    // });

    // function startautocomplete(availableTags) {

    //     $( "#search_product" ).autocomplete({
    //       source: availableTags
    //   });
    // }
</script>

@endsection
