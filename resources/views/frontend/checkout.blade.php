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
                    {{-- <i class="fa-solid fa-tags"></i> --}}
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="row">
                        {{-- Shipping Address --}}
                        <div class="col-md-12" >
                            <div class="shipng">
                                <strong class="float-left ml-2">
                                    Shipping Addres
                                </strong>
                                {{-- Update Shipping Address --}}
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
                        {{-- Payment Methods --}}
                        <div class="col-md-12" >
                            <div class="shipng">
                                <strong class="float-left ml-2">
                                    Payment Methods
                                </strong>
                                @if(@$address)
                                <button type="button" class="btn bg-color mr-4 text-white float-right" data-toggle="modal" data-target=".bd-example-modal-lg3" style="margin-left: 470px;">Change</button>
                                @endif
                            </div><br>
                            {{-- Model Update --}}
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
                        {{-- Create Model --}}
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
                    {{-- Shoping Details --}}
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
                                    {{-- <img class="w-100" src="{{asset('upload/product/'.$images[0])}}" alt=""> --}}
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
@include('layouts.inc.footer')
@endsection

@section('script')
<script>
    function show1(){
        document.getElementById('div1').style.display ='none';
        document.getElementById('div2').style.display ='block';
    }
    function show2(){
        document.getElementById('div1').style.display = 'block';
        document.getElementById('div2').style.display = 'none';
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
