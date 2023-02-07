@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Register User</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($user as $item)
                            <tr>
                                <th class="">{{$i++}}</th>
                                <td class="w-25">{{$item->name.' '.$item->lname}}</td>
                                <td class="w-25">{{$item->email}}</td>
                                <td class="w-25">{{$item->phone}}</td>

                                <td class="w-25">
                                    <a href="{{url('user-view/'.$item->id)}}" class="w-50 btn btn-primary btn-sm">View</a>
                                    {{-- <a href="{{url('user-update/'.$item->id)}}" class="w-50 btn btn-primary btn-sm">Edit</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
