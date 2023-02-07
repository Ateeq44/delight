<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\product;
use App\Models\rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ratingcontroller extends Controller
{
    public function addrating(Request $request)
    {
        $star_rating = $request->input('rating');
        $product_id = $request->input('product_id');
        $review = $request->input('review');

        $product_check = product::where('id', $product_id)->first();
        if ($product_check) {
            $verified_purchase = order::where('order.user_id', Auth::id())
            ->join('order_items', 'order.id','order_items.order_id')
            ->where('order_items.prod_id', $product_id)->get();
            if ($verified_purchase->count() > 0) {
                $existing_rating = rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
                if ($existing_rating) {
                    $existing_rating->$star_rating;
                    $existing_rating->update();
                } else {
                    $d = new rating;
                    $d->create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'stars_rating' => $star_rating,
                        'review' => $review,
                    ]);
                }
                return redirect()->back()->with('status', 'Thank you for Rating This Product');
            }
            else {
                return redirect()->back()->with('status', 'You cannot rate a product without purcahse');
            }

        }
        else {
            return redirect()->back()->with('status', 'The link you followed was broken');
        }
    }
}
