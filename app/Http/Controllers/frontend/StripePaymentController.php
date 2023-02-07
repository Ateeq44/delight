<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\order;
use App\Models\orderitem;
use App\Models\User;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
    * success response method.
    *
    * @return \Illuminate\Http\Response
    */
    public function stripe()
    {
        return view('frontend.stripe');
    }

    /**
    * success response method.
    *
    * @return \Illuminate\Http\Response
    */
    public function stripePost(Request $request)
    {
        $cartitem = cart::where('user_id', Auth::id())->get();
        $wishlist = wishlist::where('user_id', Auth::id())->get();

        $price =$request->total;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $data = Stripe\Charge::create ([
            "amount" => 100 * $price,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment"
        ]);

        $order = order::where('id', $request->id)->first();
        order::where('id', $request->id)->update(['payment_id'=>$data->id]);

        Session::flash('success', 'Payment successful!');
        $cartitem = cart::where('user_id', Auth::id())->get();
        cart::destroy($cartitem);
        return view('frontend.order.placeordershow', compact('order', 'cartitem', 'wishlist'));

    }
}
