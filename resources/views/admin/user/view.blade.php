@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Details
                        <a href="{{url('users')}}" class="btn btn-primary btn-sm float-right">Back</a>
                    </h4>
                </div>
                <hr>
                <form action="{{url('userupdate/'.$user->id)}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Role</label>
                                <div class="py-2 pl-3 border">
                                    <span>{{ $user->role_as == '0'? 'User' : 'Admin' }}</span>
                                    <span class="ml-5"><input type="checkbox" name="role" {{$user->role_as == "1" ? 'checked':''}}></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="">First Name</label>
                                <div class="py-2 pl-3 border">{{ $user->name }}</div>
                            </div>
                            <div class="col-md-4">
                                <label for="">Last Name</label>
                                <div class="py-2 pl-3 border">{{ $user->lname }}</div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="">Email</label>
                                <div class="py-2 pl-3 border">{{ $user->email }}</div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label for="">Phone</label>
                                <div class="py-2 pl-3 border">{{ $user->phone }}</div>
                            </div>
                            <div class="col-md-8 mt-4">
                                <label for="">Address</label>
                                <div class="py-2 pl-3 border">{{ $user->address }}</div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="">City</label>
                                <div class="py-2 pl-3 border">{{ $user->city }}</div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="">state</label>
                                <div class="py-2 pl-3 border">{{ $user->state }}</div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="">country</label>
                                <div class="py-2 pl-3 border">{{ $user->Country }}</div>
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="">zipcode</label>
                                <div class="py-2 pl-3 border">{{ $user->zipcode }}</div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4">Update Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
