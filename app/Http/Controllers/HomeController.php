<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wishlist;
use App\Models\cart;
use App\Models\order;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function myprofile()
    {
        $wishlist = wishlist::where('user_id', Auth::id())->get();
        $cartitem = cart::where('user_id', Auth::id())->get();
        $order = order::orderBy('created_at', 'DESC')->where('user_id', Auth::id())->take(2)->get();
        $orders_count = order::where('user_id', Auth::id())->get();
        $order_status = order::where('user_id', Auth::id())->take(2)->get();

        $rating = rating::where('user_id', Auth::id())->get();

        return view('frontend.profile', compact('wishlist', 'cartitem', 'order', 'orders_count'));
    }
    

}
