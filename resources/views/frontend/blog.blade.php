@extends('layouts.front')

@section('title')
Blog
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="hero__search">
                <div class="hero__search__form" style="width:920px !important;">
                    <form action="#">
                        <div class="hero__search__categories" style="width:10% !important;">
                            All Blogs
                        </div>
                        <input type="text" placeholder="What do yo u need?">
                        <button type="submit" class="site-btn">SEARCH</button>
                    </form>
                </div>
                <div class="hero__search__phone">
                    <div class="hero__search__phone__icon">
                        <svg class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"></path></svg><!-- <i class="fa fa-phone"></i> Font Awesome fontawesome.com -->
                    </div>
                    <div class="hero__search__phone__text">
                        <h5>+65 11.188.888</h5>
                        <span>support 24/7 time</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach ($blog as $item)
        <a href="{{url('view-blog/'.$item->id)}}">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic" style="width: 360px; height:230px;">
                        <img class="w-100" style="height: 100%;" src="{{asset('upload/blog/'.$item->image)}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li>
                                <svg class="svg-inline--fa fa-calendar-week mr-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-week" role="img" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z">
                                    </path>
                                </svg>
                                {{date_format($item->created_at, "d-m-Y")}}
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
        </a>
        @endforeach
    </div>
</div>

@include('layouts.inc.footer')
@endsection
