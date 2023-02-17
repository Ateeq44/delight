<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\cart;
use App\Models\order;
use App\Models\rating;
use App\Models\wishlist;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\TestMail;
class frontendcontroller extends Controller
{
    public function shop()
    {
        $all_product = product::with('category')->where('status', '1')->take(50000)->paginate(8);
        $all_category = category::where('status', '1')->take(4000)->get();
        $cartitem = cart::where('user_id', Auth::id())->get();
        $wishlist = wishlist::where('user_id', Auth::id())->get();

        return view('frontend.shop', compact('all_product' , "all_category", 'cartitem', 'wishlist'));
    }
    public function index()
    {
        $blogp = blog::where('status', '1')->take(6)->get();


        $feature_product = product::with('category')->where('status', '1')->orderBy('created_at', 'DESC')->take(10)->get();
        $all_category = category::where('status', '1')->get();
        $trending_category = category::where('status', '1')->take(4)->orderBy('created_at', 'DESC')->get();
        $cartitem = cart::where('user_id', Auth::id())->get();
        $wishlist = wishlist::where('user_id', Auth::id())->get();
        return view('frontend.index', compact('feature_product', "trending_category","all_category", "blogp", 'cartitem', 'wishlist'));
    }

    public function view_category($slug)

    {
        $cartitem = cart::where('user_id', Auth::id())->get();
        $wishlist = wishlist::where('user_id', Auth::id())->get();

        if (category::where('slug', $slug)->exists()) {
            $category = category::where('slug', $slug)->first();
            // Related product
            $products = product::where('cate_id', $category->id)->where('status', '1')->get();
            return view('frontend.productByCategory', compact('category', 'products', 'cartitem', 'wishlist'));
        }
        else{
            return redirect('/')->with('status', 'Slug Does not Exists');
        }
    }

    public function view_product($cate_slug, $pro_slug)
    {
        $cartitem = cart::where('user_id', Auth::id())->get();
        $wishlist = wishlist::where('user_id', Auth::id())->get();

        if (category::where('slug', $cate_slug)->exists()) {
            if (product::where('slug', $pro_slug)->exists()) {


                $product = product::where('slug', $pro_slug)->first();
                // dd($product);
                $data = [];
                $data['review'] = rating::where('prod_id',$product->id)->get();
                $verified_purchase = order::where('order.user_id', Auth::id())
                ->join('order_items', 'order.id','order_items.order_id')
                ->where('order_items.prod_id', $product->id)->get();
                $rating = rating::where('prod_id',$product->id)->get();
                $rating_sum = rating::where('prod_id',$product->id)->sum('stars_rating');
                if ($rating->count() > 0) {
                    $rating_value = $rating_sum / $rating->count();
                } else {
                    $rating_value = 0;
                }
                $cate_id = $product->cate_id;
                $relatedproduct = product::where('cate_id', $cate_id)->take(4)->get();
                return view('frontend.singleDetail', $data, compact('product', 'rating', 'rating_value','verified_purchase', 'relatedproduct', 'cartitem', 'wishlist'));
            }
            else {
                return redirect('/')->with('status', 'The link was broken!');
            }
        }
        else{
            return redirect('/')->with('status', 'No Such Category Found!');
        }
    }


    public function searchshop(Request $request){
        $all_product = product::with('category')->where('status', '1')->paginate(8);
        $cartitem = cart::where('user_id', Auth::id())->get();
        $wishlist = wishlist::where('user_id', Auth::id())->get();


        $d = $request->input('search_product');
        $searchValues = explode(' ',$d);
        $record = product::where(


            function ($q) use ($searchValues) {

                foreach ($searchValues as $value) {

                    $q->orWhere('name', 'like', "%{$value}%");

                }
            })->orWhere('name', 'like', "%{$d}%");

            $all_product = $record->orderByRaw("
            CASE WHEN name LIKE '".$d."' THEN 0 ELSE 1 END,
            CASE WHEN name regexp '(^|[[:space:]])$d([[:space:]]|$)' THEN 0 ELSE 1 END,
            CASE WHEN name LIKE '".$d."%' THEN 0 ELSE 1 END,
            CASE WHEN name LIKE '%".$d."%' THEN 0 ELSE 1 END,
            CASE WHEN name LIKE '%".$d."' THEN 0 ELSE 1 END
            ")->paginate(8);


            $all_category = Category::all();
            return view('frontend.shop' , compact(['record', "all_category", 'all_product','wishlist','cartitem']));
        }











    }


