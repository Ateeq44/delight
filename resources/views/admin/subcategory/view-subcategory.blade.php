@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">SubCategory</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($subcategory as $item)
                    <tr>
                        <th scope="row">{{@$i++}}</th>
                        <td>{{@$item->category->name}}</td>
                        <td>{{@$item->subcategory}}</td>
                        <td>{{@$item->created_at->format('d/m/Y')}}</td>
                        <td>
                            @if($item->status == 1)
                            <span class="badge bg-success text-white px-3 py-2" style="font-size:15px;">Active</span>
                            @else
                            <span class="badge bg-danger text-white px-3 py-2" style="font-size:15px;">Pending</span> 

                            @endif
                        </td>
                        <td class="w-25">
                            <a class="btn-inline-block btn btn-primary" href="{{url('subcate-edit/'.$item->id)}}"><i class="fa fa-edit  fa-2x" aria-hidden="true"></i></a>
                            <a class="btn-inline-block btn btn-danger ml-3" href="{{url('subcate-delete/'.$item->id)}}"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
