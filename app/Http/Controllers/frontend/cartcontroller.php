<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\product;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartcontroller extends Controller
{

    public function addproduct(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $color = $request->input('color');
        $size = $request->input('size');

        $prod_check = product::where('id', $product_id)->first();
        if ($prod_check) {

            if (cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                return response()->json(['status' => $prod_check->name.' Already Added To Cart']);
                $destroy = wishlist::where('prod_id', $product_id)->first();
                $destroy->destroy();
            }
            else{
                $cartItem = new cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->color = $color;
                $cartItem->size = $size;
                $cartItem->save();
                $destroy = wishlist::where('prod_id', $product_id)->first();
                $destroy->delete();
                return response()->json(['status' => $prod_check->name.' Added To Cart']);
            }
        }
    }

    public function viewcart()
    {
        $wishlist = wishlist::where('user_id', Auth::id())->get();
        $cartitem = cart::where('user_id', Auth::id())->get();
        // dd(Auth::id());
        return view('frontend.cart', compact('cartitem', 'wishlist'));
    }

    public function delete(Request $request, $id)
    {
        cart::destroy(array('id', $id));
        return redirect ('cart')->with('status', 'Cart Item Deleted Successfully');
    }

    public function increase(Request $request, $id){

        $res = cart::where('id', $id)->where('user_id', Auth::id())->first();
        cart::where('id', $id)->where('user_id', Auth::id())->update(['prod_qty' => $res->prod_qty - 1]);
        return redirect('cart');

    }
    public function decrease(Request $request, $id){

        $res = cart::where('id', $id)->where('user_id', Auth::id())->first();
        // dd($res);
        cart::where('id', $id)->where('user_id', Auth::id())->update(['prod_qty' => $res->prod_qty + 1]);
        return redirect('cart');
    }

}
