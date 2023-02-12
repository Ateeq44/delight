@extends('layouts.front')

@section('title')
Checkout
@endsection

@section('content')

<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6>
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="shipng">
                                <strong class="float-left ml-2">
                                    Shipping Addres
                                </strong>
                                @if(@$address)
                                <button type="button" class="btn bg-color mr-4 text-white float-right" data-toggle="modal" data-target=".bd-example-modal-lg4" style="margin-left: 470px;">Change</button>
                                @endif
                            </div><br>
                            <div class="modal fade bd-example-modal-lg4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-header bg-color text-white">
                                        <h5 class="modal-title " id="exampleModalLabel">Update Shipping Address</h5>
                                        <button style="" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-content" style="padding: 30px;">
                                        <form action="{{url('update-address/'.@$address->id)}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>First Name<span>*</span></p>
                                                        <input class="firstname" type="text" value="{{@$address->fname}}" name="fname" value="{{old('fname')}}">
                                                        @error("fname")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Last Name<span>*</span></p>
                                                        <input class="lastname"  type="text" value="{{@$address->lname}}" value="{{old('lname')}}" name="lname">
                                                        @error("lname")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Phone<span>*</span></p>
                                                        <input class="phone"  type="text" value="{{@$address->phone}}" value="{{old('phone')}}" name="phone">
                                                        @error("phone")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Email<span>*</span></p>
                                                        <input class="email"  type="text" value="{{@$address->email}}" value="{{old('email')}}" name="email">
                                                        @error("email")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="checkout__input">
                                                <p>Address<span>*</span></p>
                                                <textarea class="address" value="{{old('address')}}"  name="address"  rows="15">{{@$address->address}}</textarea>
                                                @error("address")
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Country<span>*</span></p>
                                                        <input class="country" value="" type="text" value="{{@$address->country}}" name="country">
                                                        @error("country")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>State<span>*</span></p>
                                                        <input class="state" value="{{@$address->state}}"  type="text" value="{{old('state')}}" name="state">
                                                        @error("state")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Town/City<span>*</span></p>
                                                        <input class="city"  type="text" value="{{@$address->city}}" name="city">
                                                        @error("city")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Postcode / ZIP<span>*</span></p>
                                                        <input class="zipcode" value="{{@$address->zipcode}}"  type="text"  name="zipcode">
                                                        @error("zipcode")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn bg-color text-white">Update</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-color text-white">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                            @if(@$address)
                            <p>Name: <strong>{{ @$address->fname }} {{ @$address->lname }}</strong></p>
                            <p>Phone#: {{ @$address->phone }}</p>
                            <p>Email: {{ @$address->email }}</p>
                            <p>Address: {{ @$address->address }}</p> </p>
                            <p>City: {{ @$address->city }}</p>
                            @endif

                            @if(!@$address)
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-bottom: 20px;">Add Shiping Address</button>
                            @endif

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-header bg-color text-white">
                                        <h5 class="modal-title " id="exampleModalLabel">Add Shipping Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-content" style="padding: 30px;">
                                        <form action="{{url('user-address')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>First Name<span>*</span></p>
                                                        <input class="firstname" type="text"  name="fname" value="{{old('fname')}}">
                                                        @error("fname")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Last Name<span>*</span></p>
                                                        <input class="lastname"  type="text" value="{{old('lname')}}" name="lname">
                                                        @error("lname")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Phone<span>*</span></p>
                                                        <input class="phone"  type="text" value="{{old('phone')}}" name="phone">
                                                        @error("phone")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Email<span>*</span></p>
                                                        <input class="email"  type="text" value="{{old('email')}}" name="email">
                                                        @error("email")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="checkout__input">
                                                <p>Address<span>*</span></p>
                                                <textarea class="address" value="{{old('address')}}"  name="address"  rows="15"></textarea>
                                                @error("address")
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Country<span>*</span></p>
                                                        <input class="country" type="text" placeholder="Country" name="country">
                                                        @error("country")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>State<span>*</span></p>
                                                        <input class="state"  type="text" value="{{old('state')}}" name="state">
                                                        @error("state")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Town/City<span>*</span></p>
                                                        <input class="city"  type="text"  value="{{old('city')}}" name="city">
                                                        @error("city")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="checkout__input">
                                                        <p>Postcode / ZIP<span>*</span></p>
                                                        <input class="zipcode"   type="text" value="{{old('zipcode')}}"  name="zipcode">
                                                        @error("zipcode")
                                                        <p class="text-danger">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn bg-color text-white">Add Address</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-color text-white">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" >
                            <div class="shipng">
                                <strong class="float-left ml-2">
                                    Payment Methods
                                </strong>
                                @if(@$address)
                                <button type="button" class="btn bg-color mr-4 text-white float-right" data-toggle="modal" data-target=".bd-example-modal-lg3" style="margin-left: 470px;">Change</button>
                                @endif
                            </div><br>
                            <div class="modal fade bd-example-modal-lg3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-header bg-color text-white">
                                        <h5 class="modal-title " id="exampleModalLabel">Update Payment Methods</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-content" style="padding: 30px;">
                                        <form action="{{url('update-payment/'.@$payment->id)}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 col-md-offset-3">
                                                    <div class="panel panel-default credit-card-box">
                                                        <div class="panel-heading display-table" >
                                                            <div class="row display-tr" >
                                                                <div class="display-td" >
                                                                    <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class='form-row row'>
                                                                <div class='col-md-12 form-group required'>
                                                                    <label class='control-label'>Name on Card</label>
                                                                    <input value="{{@$payment->card_name}}" class='form-control' name="name" size='4' type='text'>
                                                                </div>
                                                            </div>

                                                            <div class='form-row row'>
                                                                <div class='col-md-12 form-group required'>
                                                                    <label class='control-label'>Card Number</label>
                                                                    <input value="{{@$payment->card_number}}" autocomplete='off' class='form-control card-number' name="number" size='20'
                                                                    type='number'>
                                                                </div>
                                                            </div>

                                                            <div class='form-row row'>
                                                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                                    <label class='control-label'>CVC</label> <input value="{{@$payment->cvc}}" autocomplete='off'
                                                                    class='form-control card-cvc' size='4'
                                                                    type='text' name="cvc">
                                                                </div>
                                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                    <label class='control-label'>Expiration Month</label> <input value="{{@$payment->date_exp}}"
                                                                    class='form-control card-expiry-month' name="exp_month" size='2'
                                                                    type='text'>
                                                                </div>
                                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                    <label class='control-label'>Expiration Year</label> <input
                                                                    class='form-control card-expiry-year' value="{{@$payment->year_exp}}" name="exp_year" size='4'
                                                                    type='text'>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <button class="btn text-white bg-color" type="submit">Update</button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer bg-color text-white">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                        @if(@$payment)
                        <p>Card Holder Name: {{@$payment->card_name}}</p>
                        <p>Card Number: {{@$payment->card_number}}</p>
                        <p>CVC #: {{@$payment->cvc}}</p>
                        <p>Expiry Date: {{@$payment->date_exp}}</span>-<span>{{@$payment->year_exp}}</span> </p>
                        @endif

                        @if(!@$payment)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg1" style="margin-bottom: 20px;">Add Payment Methods</button>
                        @endif

                        <div class="modal fade bd-example-modal-lg1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-header bg-color text-white">
                                    <h5 class="modal-title " id="exampleModalLabel">Payment Methods</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-content" style="padding: 30px;">
                                    <form action="{{url('user-payment')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 col-md-offset-3">
                                                <div class="panel panel-default credit-card-box">
                                                    <div class="panel-heading display-table" >
                                                        <div class="row display-tr" >
                                                            <div class="display-td" >
                                                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body">

                                                        @if (Session::has('success'))
                                                        <div class="alert alert-success text-center">
                                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                            <p>{{ Session::get('success') }}</p>
                                                        </div>
                                                        @endif

                                                        <form
                                                        role="form"
                                                        action="{{ url('user-payment') }}"
                                                        method="post"
                                                        class="require-validation"
                                                        data-cc-on-file="false"
                                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                        id="payment-form">
                                                        @csrf

                                                        <div class='form-row row'>
                                                            <div class='col-lg-12 form-group required'>
                                                                <label class='control-label'>Name on Card</label>
                                                                <input class='form-control' name="name" size='4' type='text'>
                                                            </div>
                                                        </div>

                                                        <div class='form-row row'>
                                                            <div class='col-lg-12 form-group required'>
                                                                <label class='control-label'>Card Number</label>
                                                                <input autocomplete='off' class='form-control card-number' name="number" size='20'
                                                                type='number'>
                                                            </div>
                                                        </div>

                                                        <div class='form-row row'>
                                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                class='form-control card-cvc' size='4'
                                                                type='text' name="cvc">
                                                            </div>
                                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                <label class='control-label'>Expiration Month</label> <input
                                                                class='form-control card-expiry-month' name="exp_month" size='2'
                                                                type='text'>
                                                            </div>
                                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                <label class='control-label'>Expiration Year</label> <input
                                                                class='form-control card-expiry-year' name="exp_year" size='4'
                                                                type='text'>
                                                            </div>
                                                        </div>

                                                        <div class='form-row row'>
                                                            <div class='col-md-12 error form-group hide'>
                                                                <div class='alert-danger alert'>Please correct the errors and try
                                                                again.</div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <button class="btn btn-primary btn-lg btn-block bg-color" type="submit">Add payment Method</button>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer bg-color text-white">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shipng">
                        <strong class="float-left ml-3">
                            Shipping Address
                        </strong>
                    </div><br>
                    @foreach ($cartitem as $item)
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div>
                                @php
                                $images = json_decode($item->cartproducts->image);
                                @endphp
                                
                                <img src="{{asset('upload/product/'.$images[0])}}"
                                class="img-fluid rounded-3" alt="Shopping item" style="width: 200px;">
                            </div>
                            <div class="ml-3">
                                <p class="mr-5" style="display: -webkit-box;-webkit-line-clamp:1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;text-align: left !important; font-size:15px;">{{$item->cartproducts->name}}</p>
                                <p class="small mb-0">X{{$item->prod_qty}}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            @php
                            @$totalprice = $item->cartproducts->selling_price * $item->prod_qty;
                            @endphp
                            <div style="width: 80px;">
                                <h5 class="mb-0">${{@$totalprice}}</h5>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="checkout__order">
                <form action="{{url('place_order')}}" method="POST" class="require-validation"  data-cc-on-file="false"  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"  id="payment-form">
                    @csrf
                    {{-- Shipping Address --}}
                    <input type="hidden" name="fname" value="{{ @$address->fname }}">
                    <input type="hidden" name="lname"  value="{{ @$address->lname }}">
                    <input type="hidden" name="email"  value="{{ @$address->email }}">
                    <input type="hidden" name="phone"  value="{{ @$address->phone }}">
                    <input type="hidden" name="address"  value="{{ @$address->address }}">
                    <input type="hidden" name="city"  value="{{ @$address->city}}">
                    <input type="hidden" name="state"  value="{{ @$address->state}}">
                    <input type="hidden" name="country"  value="{{ @$address->country }}">
                    <input type="hidden" name="zipcode"  value="{{ @$address->zipcode}}">
                    {{-- Shipping Address --}}
                    <input type="hidden" name="card_name" id="card_name" value="{{ @$payment->card_name}}">
                    <input type="hidden" name="card_number" id="card_number" value="{{ @$payment->card_number}}">
                    <input type="hidden" name="cvc" id="cvc" value="{{ @$payment->cvc}}">
                    <input type="hidden" name="date_exp" id="date_exp" value="{{ @$payment->date_exp}}">
                    <input type="hidden" name="year_exp" id="year_exp" value="{{ @$payment->year_exp}}">

                    @foreach ($cartitem as $item)
                    <input type="hidden" value="{{$item->prod_qty}}">
                    <input type="hidden" value="{{$item->cartproducts->selling_price}}">
                    @php
                    @$subtotal += $item->cartproducts->selling_price * $item->prod_qty;
                    @$tax += $item->cartproducts->tax;
                    @$total =  $subtotal + $tax;
                    @endphp
                    @endforeach
                    <h4>Payment</h4>

                    <div class="checkout__order__subtotal">
                        Subtotal
                        <span>
                            @if (@$subtotal > 0)
                            ${{@$subtotal}}
                            @else
                            $0
                            @endif
                        </span>
                    </div>
                    <div class="checkout__order__subtotal">
                        Shipping Charges
                        <span>
                            @if (@$tax > 0)
                            ${{@$tax}}
                            @else
                            $0
                            @endif

                        </span>
                    </div>
                    <div class="checkout__order__total">
                        Total
                        <span>
                            @if (@$total>0)
                            ${{@$total}}
                            @else
                            $0
                            @endif
                        </span>
                    </div>
                    <input type="hidden" name="total" value="{{@$total}}">
                    <button type="submit" class="site-btn">PLACE ORDER</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Product name</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Second product</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Third item</h6>
                        <small class="text-muted">Brief description</small>
                    </div>
                    <span class="text-muted">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate="">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid last name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control" id="username" placeholder="Username" required="">
                        <div class="invalid-feedback" style="width: 100%;">
                            Your username is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" required="">
                            <option>country</option>
                            <option value="Kabul">Afghanistan</option>
                            <option value="Mariehamn">Åland Islands</option>
                            <option value="Tirana">Albania</option>
                            <option value="Algiers">Algeria</option>
                            <option value="Pago Pago">American Samoa</option>
                            <option value="Andorra la Vella">Andorra</option>
                            <option value="Luanda">Angola</option>
                            <option value="The Valley">Anguilla</option>
                            <option value="Antarctica">Antarctica</option>
                            <option value="St. John's">Antigua & Barbuda</option>
                            <option value="Buenos Aires">Argentina</option>
                            <option value="Yerevan">Armenia</option>
                            <option value="Oranjestad">Aruba</option>
                            <option value="Canberra">Australia</option>
                            <option value="Vienna">Austria</option>
                            <option value="Baku">Azerbaijan</option>
                            <option value="Nassau">Bahamas</option>
                            <option value="Manama">Bahrain</option>
                            <option value="Dhaka">Bangladesh</option>
                            <option value="Bridgetown">Barbados</option>
                            <option value="Minsk">Belarus</option>
                            <option value="Brussels">Belgium</option>
                            <option value="Belmopan">Belize</option>
                            <option value="Porto-Novo">Benin</option>
                            <option value="Hamilton">Bermuda</option>
                            <option value="Thimphu">Bhutan</option>
                            <option value="Sucre">Bolivia</option>
                            <option value="Kralendijk">Caribbean Netherlands</option>
                            <option value="Sarajevo">Bosnia & Herzegovina</option>
                            <option value="Gaborone">Botswana</option>
                            <option value="">Bouvet Island</option>
                            <option value="Brasilia">Brazil</option>
                            <option value="Diego Garcia">British Indian Ocean Territory</option>
                            <option value="Bandar Seri Begawan">Brunei</option>
                            <option value="Sofia">Bulgaria</option>
                            <option value="Ouagadougou">Burkina Faso</option>
                            <option value="Bujumbura">Burundi</option>
                            <option value="Phnom Penh">Cambodia</option>
                            <option value="Yaounde">Cameroon</option>
                            <option value="Ottawa">Canada</option>
                            <option value="Praia">Cape Verde</option>
                            <option value="George Town">Cayman Islands</option>
                            <option value="Bangui">Central African Republic</option>
                            <option value="N'Djamena">Chad</option>
                            <option value="Santiago">Chile</option>
                            <option value="Beijing">China</option>
                            <option value="Flying Fish Cove">Christmas Island</option>
                            <option value="West Island">Cocos (Keeling) Islands</option>
                            <option value="Bogota">Colombia</option>
                            <option value="Moroni">Comoros</option>
                            <option value="Brazzaville">Congo - Brazzaville</option>
                            <option value="Kinshasa">Congo - Kinshasa</option>
                            <option value="Avarua">Cook Islands</option>
                            <option value="San Jose">Costa Rica</option>
                            <option value="Yamoussoukro">Côte d’Ivoire</option>
                            <option value="Zagreb">Croatia</option>
                            <option value="Havana">Cuba</option>
                            <option value="Willemstad">Curaçao</option>
                            <option value="Nicosia">Cyprus</option>
                            <option value="Prague">Czechia</option>
                            <option value="Copenhagen">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Roseau">Dominica</option>
                            <option value="Santo Domingo">Dominican Republic</option>
                            <option value="Quito">Ecuador</option>
                            <option value="Cairo">Egypt</option>
                            <option value="San Salvador">El Salvador</option>
                            <option value="Malabo">Equatorial Guinea</option>
                            <option value="Asmara">Eritrea</option>
                            <option value="Tallinn">Estonia</option>
                            <option value="Addis Ababa">Ethiopia</option>
                            <option value="Stanley">Falkland Islands (Islas Malvinas)</option>
                            <option value="Torshavn">Faroe Islands</option>
                            <option value="Suva">Fiji</option>
                            <option value="Helsinki">Finland</option>
                            <option value="Paris">France</option>
                            <option value="Cayenne">French Guiana</option>
                            <option value="Papeete">French Polynesia</option>
                            <option value="Port-aux-Francais">French Southern Territories</option>
                            <option value="Libreville">Gabon</option>
                            <option value="Banjul">Gambia</option>
                            <option value="Tbilisi">Georgia</option>
                            <option value="Berlin">Germany</option>
                            <option value="Accra">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Athens">Greece</option>
                            <option value="Nuuk">Greenland</option>
                            <option value="St. George's">Grenada</option>
                            <option value="Basse-Terre">Guadeloupe</option>
                            <option value="Hagatna">Guam</option>
                            <option value="Guatemala City">Guatemala</option>
                            <option value="St Peter Port">Guernsey</option>
                            <option value="Conakry">Guinea</option>
                            <option value="Bissau">Guinea-Bissau</option>
                            <option value="Georgetown">Guyana</option>
                            <option value="Port-au-Prince">Haiti</option>
                            <option value="">Heard & McDonald Islands</option>
                            <option value="Vatican City">Vatican City</option>
                            <option value="Tegucigalpa">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Budapest">Hungary</option>
                            <option value="Reykjavik">Iceland</option>
                            <option value="New Delhi">India</option>
                            <option value="Jakarta">Indonesia</option>
                            <option value="Tehran">Iran</option>
                            <option value="Baghdad">Iraq</option>
                            <option value="Dublin">Ireland</option>
                            <option value="Douglas, Isle of Man">Isle of Man</option>
                            <option value="Jerusalem">Israel</option>
                            <option value="Rome">Italy</option>
                            <option value="Kingston">Jamaica</option>
                            <option value="Tokyo">Japan</option>
                            <option value="Saint Helier">Jersey</option>
                            <option value="Amman">Jordan</option>
                            <option value="Astana">Kazakhstan</option>
                            <option value="Nairobi">Kenya</option>
                            <option value="Tarawa">Kiribati</option>
                            <option value="Pyongyang">North Korea</option>
                            <option value="Seoul">South Korea</option>
                            <option value="Pristina">Kosovo</option>
                            <option value="Kuwait City">Kuwait</option>
                            <option value="Bishkek">Kyrgyzstan</option>
                            <option value="Vientiane">Laos</option>
                            <option value="Riga">Latvia</option>
                            <option value="Beirut">Lebanon</option>
                            <option value="Maseru">Lesotho</option>
                            <option value="Monrovia">Liberia</option>
                            <option value="Tripolis">Libya</option>
                            <option value="Vaduz">Liechtenstein</option>
                            <option value="Vilnius">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macao">Macao</option>
                            <option value="Skopje">North Macedonia</option>
                            <option value="Antananarivo">Madagascar</option>
                            <option value="Lilongwe">Malawi</option>
                            <option value="Kuala Lumpur">Malaysia</option>
                            <option value="Male">Maldives</option>
                            <option value="Bamako">Mali</option>
                            <option value="Valletta">Malta</option>
                            <option value="Majuro">Marshall Islands</option>
                            <option value="Fort-de-France">Martinique</option>
                            <option value="Nouakchott">Mauritania</option>
                            <option value="Port Louis">Mauritius</option>
                            <option value="Mamoudzou">Mayotte</option>
                            <option value="Mexico City">Mexico</option>
                            <option value="Palikir">Micronesia</option>
                            <option value="Chisinau">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Ulan Bator">Mongolia</option>
                            <option value="Podgorica">Montenegro</option>
                            <option value="Plymouth">Montserrat</option>
                            <option value="Rabat">Morocco</option>
                            <option value="Maputo">Mozambique</option>
                            <option value="Nay Pyi Taw">Myanmar (Burma)</option>
                            <option value="Windhoek">Namibia</option>
                            <option value="Yaren">Nauru</option>
                            <option value="Kathmandu">Nepal</option>
                            <option value="Amsterdam">Netherlands</option>
                            <option value="Willemstad">Curaçao</option>
                            <option value="Noumea">New Caledonia</option>
                            <option value="Wellington">New Zealand</option>
                            <option value="Managua">Nicaragua</option>
                            <option value="Niamey">Niger</option>
                            <option value="Abuja">Nigeria</option>
                            <option value="Alofi">Niue</option>
                            <option value="Kingston">Norfolk Island</option>
                            <option value="Saipan">Northern Mariana Islands</option>
                            <option value="Oslo">Norway</option>
                            <option value="Muscat">Oman</option>
                            <option value="Islamabad">Pakistan</option>
                            <option value="Melekeok">Palau</option>
                            <option value="East Jerusalem">Palestine</option>
                            <option value="Panama City">Panama</option>
                            <option value="Port Moresby">Papua New Guinea</option>
                            <option value="Asuncion">Paraguay</option>
                            <option value="Lima">Peru</option>
                            <option value="Manila">Philippines</option>
                            <option value="Adamstown">Pitcairn Islands</option>
                            <option value="Warsaw">Poland</option>
                            <option value="Lisbon">Portugal</option>
                            <option value="San Juan">Puerto Rico</option>
                            <option value="Doha">Qatar</option>
                            <option value="Saint-Denis">Réunion</option>
                            <option value="Bucharest">Romania</option>
                            <option value="Moscow">Russia</option>
                            <option value="Kigali">Rwanda</option>
                            <option value="Gustavia">St. Barthélemy</option>
                            <option value="Jamestown">St. Helena</option>
                            <option value="Basseterre">St. Kitts & Nevis</option>
                            <option value="Castries">St. Lucia</option>
                            <option value="Marigot">St. Martin</option>
                            <option value="Saint-Pierre">St. Pierre & Miquelon</option>
                            <option value="Kingstown">St. Vincent & Grenadines</option>
                            <option value="Apia">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome">São Tomé & Príncipe</option>
                            <option value="Riyadh">Saudi Arabia</option>
                            <option value="Dakar">Senegal</option>
                            <option value="Belgrade">Serbia</option>
                            <option value="Belgrade">Serbia</option>
                            <option value="Victoria">Seychelles</option>
                            <option value="Freetown">Sierra Leone</option>
                            <option value="Singapur">Singapore</option>
                            <option value="Philipsburg">Sint Maarten</option>
                            <option value="Bratislava">Slovakia</option>
                            <option value="Ljubljana">Slovenia</option>
                            <option value="Honiara">Solomon Islands</option>
                            <option value="Mogadishu">Somalia</option>
                            <option value="Pretoria">South Africa</option>
                            <option value="Grytviken">South Georgia & South Sandwich Islands</option>
                            <option value="Juba">South Sudan</option>
                            <option value="Madrid">Spain</option>
                            <option value="Colombo">Sri Lanka</option>
                            <option value="Khartoum">Sudan</option>
                            <option value="Paramaribo">Suriname</option>
                            <option value="Longyearbyen">Svalbard & Jan Mayen</option>
                            <option value="Mbabane">Eswatini</option>
                            <option value="Stockholm">Sweden</option>
                            <option value="Berne">Switzerland</option>
                            <option value="Damascus">Syria</option>
                            <option value="Taipei">Taiwan</option>
                            <option value="Dushanbe">Tajikistan</option>
                            <option value="Dodoma">Tanzania</option>
                            <option value="Bangkok">Thailand</option>
                            <option value="Dili">Timor-Leste</option>
                            <option value="Lome">Togo</option>
                            <option value="">Tokelau</option>
                            <option value="Nuku'alofa">Tonga</option>
                            <option value="Port of Spain">Trinidad & Tobago</option>
                            <option value="Tunis">Tunisia</option>
                            <option value="Ankara">Turkey</option>
                            <option value="Ashgabat">Turkmenistan</option>
                            <option value="Cockburn Town">Turks & Caicos Islands</option>
                            <option value="Funafuti">Tuvalu</option>
                            <option value="Kampala">Uganda</option>
                            <option value="Kiev">Ukraine</option>
                            <option value="Abu Dhabi">United Arab Emirates</option>
                            <option value="London">United Kingdom</option>
                            <option value="Washington">United States</option>
                            <option value="">U.S. Outlying Islands</option>
                            <option value="Montevideo">Uruguay</option>
                            <option value="Tashkent">Uzbekistan</option>
                            <option value="Port Vila">Vanuatu</option>
                            <option value="Caracas">Venezuela</option>
                            <option value="Hanoi">Vietnam</option>
                            <option value="Road Town">British Virgin Islands</option>
                            <option value="Charlotte Amalie">U.S. Virgin Islands</option>
                            <option value="Mata Utu">Wallis & Futuna</option>
                            <option value="El-Aaiun">Western Sahara</option>
                            <option value="Sanaa">Yemen</option>
                            <option value="Lusaka">Zambia</option>
                            <option value="Harare">Zimbabwe</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required="">
                            <option value="">Choose...</option>
                            <option>California</option>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required="">
                        <div class="invalid-feedback">
                            Zip code required.
                        </div>
                    </div>
                </div>

                <hr class="mb-4">

                <h4 class="mb-3">Payment</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio"onclick="show1();" class="custom-control-input" checked="" required="">
                        <label class="custom-control-label" for="credit">Cash On Delivery</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" onclick="show2();" class="custom-control-input" required="">
                        <label class="custom-control-label" for="debit" >Debit card | Credit card</label>
                    </div>
                </div>
                <div class="row" id="div1" style="display: none;">
                    <hr class="mb-4" style="width: 97%; margin-left: 13px;">                        
                    <div class="col-md-12 col-md-offset-3">
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-heading display-table">
                                <div class="row display-tr">
                                    <div class="display-td mb-4" >
                                        <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body ">
                                <div class="form-row row">
                                    <div class="col-md-12 form-group required mb-4">
                                        <label class="control-label">Name on Card</label>
                                        <input value="" class="form-control" name="name" size="4" type="text">
                                    </div>
                                </div>

                                <div class="form-row row">
                                    <div class="col-md-12 form-group required mb-4">
                                        <label class="control-label">Card Number</label>
                                        <input value="" autocomplete="off" class="form-control card-number" name="number" size="20" type="number">
                                    </div>
                                </div>

                                <div class="form-row row">
                                    <div class="col-xs-12 col-md-4 form-group cvc required">
                                        <label class="control-label">CVC</label> <input value="" autocomplete="off" class="form-control card-cvc" size="4" type="text" name="cvc">
                                    </div>
                                    <div class="col-xs-12 col-md-4 form-group expiration required">
                                        <label class="control-label">Expiration Month</label> <input value="" class="form-control card-expiry-month" name="exp_month" size="2" type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-4 form-group expiration required">
                                        <label class="control-label">Expiration Year</label> <input class="form-control card-expiry-year" value="" name="exp_year" size="4" type="text">
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order</button>
            </form>
        </div>
    </div>
</div>

@include('layouts.inc.footer')
@endsection

@section('script')
<script>
    function show1(){
        document.getElementById('div1').style.display ='none';
    }
    function show2(){
        document.getElementById('div1').style.display = 'block';
    }


    $(function() {

        var $form         = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid         = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('#card_number').val(),
                    cvc: $('#cvc').val(),
                    exp_month: $('#date_exp').val(),
                    exp_year: $('#year_exp').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
@endsection
