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
        $order->country = $request->input('country');
        $order->payment_id = $request->stripeToken;
        $order->zipcode = $request->input('zipcode');
        $order->order_note = $request->input('order_note');
        $order->total_price = $request->input('total');
        // $order->total_price = $request->total;
        $order->status = 0;
        $order->tracking_no = '#'.rand(11111111,99999999);
        $order->save();
        // $save_order = new order;
        // $save_order->user_id = Auth::id();
        // $save_order->total_price = $request->total;
        // $save_order->status = 0;
        // $save_order->tracking_no = '#'.rand(11111111,99999999);
        // $save_order->save();

        $cartitem = cart::where('user_id', Auth::id())->get();
        // dd($cartitem);
        foreach ($cartitem as $item) {
            orderitem::create([
                'order_id' =>$order->id,
                'prod_id' =>$item->prod_id,
                'price' =>$item->cartproducts->selling_price,
                'qty' =>$item->prod_qty,
            ]);
        }
        // if (Auth::user()->address == NULL) {
            //     $user = User::where('id', Auth::id())->first();
            //     $user->name = $request->input('fname');
            //     $user->lname = $request->input('lname');
            //     $user->phone = $request->input('phone');
            //     $user->address = $request->input('address');
            //     $user->city = $request->input('city');
            //     $user->state = $request->input('state');
            //     $user->country = $request->input('country');
            //     $user->zipcode = $request->input('zipcode');
            //     $user->update();
            // }


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
            return view('frontend.order.placeordershow', compact('order', 'cartitem', 'wishlist'));

            // if($request->action == 'homepage'){
                //     $cartitem = cart::where('user_id', Auth::id())->get();
                //     cart::destroy($cartitem);
                //     return view('frontend.order.placeordershow', compact('order', 'cartitem', 'wishlist'));

                // }
                // if($request->action == 'same_form'){
                    //     $data = [];
                    //     $data['cartitem'] = $cartitem;
                    //     $data['order_id'] = $order->id;
                    //     return view('frontend.stripe', $data, compact('cartitem', 'wishlist'));
                    // }

                }
                // form fill
                public function useradress_save(Request $request)
                {
                    $wishlist = wishlist::where('user_id', Auth::id())->get();
                    $cartitem = cart::where('user_id', Auth::id())->get();
                    $request->validate([
                        "fname"=>"required",
                        "lname"=>"required",
                        "email"=>"required",
                        "phone"=>"required",
                        "address"=>"required",
                        "city"=>"required",
                        "state"=>"required",
                        "country"=>"required",
                        "zipcode"=>"required",


                    ],
                    [
                        "fname.required"=>"First Name is required",
                        "lname.required"=>"Last name is required",
                        "email.required"=>"email is required",
                        "phone.required"=>"Phone is required",
                        "address.required"=>"address is required",
                        "city.required"=>"City is required",
                        "state.required"=>"State is required",
                        "country.required"=>"Country is required",
                        "zipcode.required"=>"Zipcode is required",
                    ]);

                    $order = new useradress();
                    $order->user_id = Auth::id();
                    $order->fname = $request->input('fname');
                    $order->lname = $request->input('lname');
                    $order->email = $request->input('email');
                    $order->phone = $request->input('phone');
                    $order->address = $request->input('address');
                    $order->city = $request->input('city');
                    $order->state = $request->input('state');
                    $order->country = $request->input('country');
                    $order->zipcode = $request->input('zipcode');
                    $order->save();
                    return redirect('/checkout')->with('status', 'Shipping Details Added Successfully');

                }

                public function user_payment(Request $request)
                {
                    $order = new Paymentmethods();
                    $order->user_id = Auth::id();
                    $order->card_name = $request->input('name');
                    $order->card_number = $request->input('number');
                    $order->cvc = $request->input('cvc');
                    $order->date_exp = $request->input('exp_month');
                    $order->year_exp = $request->input('exp_year');
                    $order->save();
                    return redirect('/checkout')->with('status', 'payment Method Added Successfully');


                }

                public function address_update(Request $request, $id)
                {

                    $useraddress = useradress::find($id);
                    $useraddress->fname = $request->input('fname');
                    $useraddress->lname = $request->input('lname');
                    $useraddress->email = $request->input('email');
                    $useraddress->phone = $request->input('phone');
                    $useraddress->address = $request->input('address');
                    $useraddress->city = $request->input('city');
                    $useraddress->state = $request->input('state');
                    $useraddress->country = $request->input('country');
                    $useraddress->zipcode = $request->input('zipcode');
                    $useraddress->update();
                    return redirect('/checkout')->with('status', 'Shipping Address Updated Successfully');
                }
                public function payment_update(Request $request, $id)
                {

                    $payment = Paymentmethods::find($id);
                    $payment->card_name = $request->input('name');
                    $payment->card_number = $request->input('number');
                    $payment->cvc = $request->input('cvc');
                    $payment->date_exp = $request->input('exp_month');
                    $payment->year_exp = $request->input('exp_year');
                    $payment->update();
                    return redirect('/checkout')->with('status', 'Payment Method Updated Successfully');
                }


            }
