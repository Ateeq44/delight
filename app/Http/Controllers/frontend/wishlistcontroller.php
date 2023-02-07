<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\product;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class wishlistcontroller extends Controller
{
    public function index()
    {
        $cartitem = cart::where('user_id', Auth::id())->get();
        $wishlist = wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist', 'cartitem'));
    }
    public function add(Request $request)
    {

        if(Auth::check()){
            $prod_id = $request->input('prod_id');
            if (product::find($prod_id)) {
                $wish = new wishlist;
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => 'Added To Wishlist']);


            } else {
                return response()->json(['status' => 'Product Does not Exist']);
            }
        }
    }

    public function delete(Request $request, $id)
    {
        wishlist::destroy(array('id', $id));
        return redirect ('wishlist')->with('status', 'Wishlist Item Deleted Successfully');
    }



}
