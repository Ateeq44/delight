<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\order;
use App\Models\orderitem;
use App\Models\Paymentmethods;
use App\Models\product;
use App\Models\wishlist;
use App\Models\useradress;
use Faker\Provider\nl_BE\Payment;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderMail;
use App\Mail\CustomerMail;
use Illuminate\Support\Facades\Mail;
use Stripe;

class checkoutController extends Controller
{
    public function checkout()
    {
        $wishlist = wishlist::where('user_id', Auth::id())->get();
        $cartitem = cart::where('user_id', Auth::id())->get();
        $old_cartitem = cart::where('user_id', Auth::id())->get();

        $cartitem = cart::where('user_id', Auth::id())->get();

        $address = useradress::where('user_id', Auth::id())->first();
        $payment = Paymentmethods::where('user_id', Auth::id())->first();


        return view('frontend.checkout', compact('address', 'payment', 'cartitem', 'wishlist'));
    }


    public function placeorder(Request $request)
    {
        $wishlist = wishlist::where('user_id', Auth::id())->get();
        $cartitem = cart::where('user_id', Auth::id())->get();


        // $order->payment_method = $request->input('payment');

        // Stripe payment
        $price =$request->total;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // dd($request->stripeToken);
        $data = Stripe\Charge::create ([
            "amount" => 100 * $price,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment"
        ]);
        // dd($data);
        $order = order::where('id', $request->id)->first();
        order::where('id', $request->id)->update(['payment_id'=>$data->id]);

        //To calculate the total price
        $total = 0;
        $cartitem_total = cart::where('user_id', Auth::id())->get();
        foreach ($cartitem_total as $item) {
            $total += $item->cartproducts->selling_price * $item->qty;
        }
        $order = new order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->payment_method = $request->input('payment_method');
        $order->country = $request->input('country');
        $order->payment_id = $request->stripeToken;
        $order->zipcode = $request->input('zipcode');
        $order->order_note = $request->input('order_note');
        $order->total_price = $request->input('total');
        // $order->total_price = $request->total;
        $order->status = 0;
        $order->tracking_no = '#'.rand(11111111,99999999);
        $order->save();

        $cartitem = cart::where('user_id', Auth::id())->get();
        // dd($cartitem);
        foreach ($cartitem as $item) {
            orderitem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'price' => $item->cartproducts->selling_price,
                'qty' => $item->prod_qty,
                'color' => $item->color,
                'size' => $item->size,
            ]);
        }
        
        $admin_order = [
            'title' => $request->input('fname'),
            'email' => $request->input('email'),
            'subject' => 'Order',
            'product' => $order->id,
            'order' => $order,
        ];
        $cus_details = [

            'title' =>  $request->input('fname'),
            'subject' =>'Order',
            'order' => $order,

        ];

        Mail::to('Ateeqrehman4344@gmail.com')->send(new OrderMail($admin_order));
        Mail::to($order->email)->send(new CustomerMail($cus_details));

        $cartitem = cart::where('user_id', Auth::id())->get();
        cart::destroy($cartitem);
        $payment = Paymentmethods::where('user_id', Auth::id())->get();
        Paymentmethods::destroy($payment);

        return view('frontend.order.thankyou', compact('order', 'cartitem', 'wishlist'));
    }

    public function thankyou()
    {
        $wishlist = wishlist::where('user_id', Auth::id())->get();
        $cartitem = cart::where('user_id', Auth::id())->get();
        return view('frontend.order.thankyou', compact('cartitem', 'wishlist'));
    }
}
