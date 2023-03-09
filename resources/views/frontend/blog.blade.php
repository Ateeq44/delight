@extends('layouts.front')

@section('title')
Blog
@endsection

@section('content')

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
