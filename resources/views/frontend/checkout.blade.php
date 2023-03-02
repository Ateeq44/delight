    <style>

    </style>
    @extends('layouts.front')
    @section('title')
    Checkout
    @endsection

    @section('content')

    <div class="container">
      <div class="py-5 text-center">


      </div>

      <div class="row">
        <div class="col-md-6 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{$cartitem->count()}}</span>
          </h4>
          <ul class="list-group mb-3">
            @foreach ($cartitem as $item)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">
                  <span>
                    Qty: {{$item->prod_qty}}X
                  </span>
                  <span class="ml-4">
                     {{$item->color}}
                  </span>
                  <span class="ml-4">
                     {{$item->size}}
                  </span>
                </h6>
                <small class="text-muted mt-2">
                  {{$item->cartproducts->name}}
                </small>
              </div>
              <span class="text-muted mt-2">
                ${{$item->cartproducts->selling_price}}

              </span>
            </li>
            <input type="hidden" value="{{$item->prod_qty}}">
            <input type="hidden" value="{{$item->cartproducts->selling_price}}">
            @php
            @$subtotal += $item->cartproducts->selling_price * $item->prod_qty;
            @$tax += $item->cartproducts->tax;
            @$total =  $subtotal + $tax;
            @endphp
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
              <span>Shipping Charges</span>
              <strong>${{@$item->cartproducts->tax}}</strong>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>${{@$total}}</strong>
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
        <div class="col-md-6 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form action="{{url('place_order')}}" method="POST" class="require-validation"  data-cc-on-file="false"  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"  id="payment-form">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="fname" id="firstName" placeholder="" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" name="lname" id="lastName" placeholder="" value="" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="" required>
              </div>
              <div class=" col-md-6 mb-3">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" name="phone" id="phone" placeholder="">
              </div>
            </div>
            <div class="mb-3">
              <label for="address">Address</label>
              <textarea class="form-control" name="address"></textarea>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="address">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="country">Country</label>
                <input type="text" name="country" class="form-control" name="">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="state">State</label>
                <input type="text" name="state" class="form-control" name="">
              </div>
              <div class="col-md-6 mb-3">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" name="zipcode" id="" placeholder="" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="zip">Order Note(Optional)</label>
                <textarea class="form-control" name="order_note"></textarea>
              </div>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="payment_method" value="COD" onclick="show1();"  type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Cash On Delivery</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="payment_method" onclick="show2();" value="PAID" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card | Debit Card</label>
              </div>
            </div>
            <div style="display: none;" id="div1">
              <div class="row" >
                <div class="col-md-6 mb-3">
                  <label for="cc-name">Name on card</label>
                  <input type="text" class="form-control" name="card_name" id="card_name" placeholder="" required>
                  <small class="text-muted">Full name as displayed on card</small>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="cc-number">Credit card number</label>
                  <input type="text" class="form-control" name="card_number" id="card_number" placeholder="" required>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label for="cc-expiration">Expiry Month</label>
                  <input type="text" class="form-control" name="date_exp" id="date_exp"  placeholder="" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="cc-expiration">Expiry Year</label>
                  <input type="text" class="form-control" name="year_exp" id="year_exp"  placeholder="" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="cc-cvv">CVV</label>
                  <input type="text" class="form-control" name="cvc" id="cvc" placeholder="" required>
                </div>
              </div>
            </div>

            @foreach ($cartitem as $item)
            <input type="hidden" value="{{$item->prod_qty}}">
            <input type="hidden" value="{{$item->cartproducts->selling_price}}">
            @php
            @$subtotal += $item->cartproducts->selling_price * $item->prod_qty;
            @$tax += $item->cartproducts->tax;
            @$total =  $subtotal + $tax;
            @endphp
            @endforeach

            <input type="hidden" name="total" value="{{@$total}}">

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

        var $form = $(".require-validation");

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
