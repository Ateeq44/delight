@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>View Blog</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($collection as $item)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <a href="{{url('blog-delete/'.$item->id)}}"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                            <a href="{{url('edit-blog/'.$item->id)}}"><i class="fa fa-edit ml-3 fa-2x" aria-hidden="true"></i></a>
                            {{-- <a href="{{url('blog-view/'.$item->id)}}"><i class="fa fa-eye ml-3 fa-2x" aria-hidden="true"></i></a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
