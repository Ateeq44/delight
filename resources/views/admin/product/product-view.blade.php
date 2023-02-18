@extends('layouts.admin')
@section('content')
    {!! json_decode($product->description) !!}
@endsection
