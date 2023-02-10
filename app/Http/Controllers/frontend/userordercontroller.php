<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\order;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userordercontroller extends Controller
{
    public function myorder()
    {
        $cartitem = cart::where('user_id', Auth::id())->get();
        $wishlist = wishlist::where('user_id', Auth::id())->get();

        $order = order::orderBy('created_at', 'DESC')->where('user_id', Auth::id())->get();
        return view("frontend.order.view", compact('order', 'cartitem', 'wishlist'));
    }
    public function view($id)
    {
        $wishlist = wishlist::where('user_id', Auth::id())->get();

        $cartitem = cart::where('user_id', Auth::id())->get();
        $order = order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.order.singleview', compact('order', 'cartitem', 'wishlist'));
    }
}
