<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\cart;
use App\Models\blogreview;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class blogcontroller extends Controller
{
    public function blog()
    {
        $wishlist = wishlist::where('user_id', Auth::id())->get();
        $cartitem = cart::where('user_id', Auth::id())->get();
        $blog = blog::where('status', '1')->take(4000)->get();
        $blogp = blog::where('status', '1')->take(6)->get();
        return view('frontend.blog', compact('blog', 'blogp', 'cartitem', 'wishlist'));
    }
    public function blogshow($id)
    {

        $wishlist = wishlist::where('user_id', Auth::id())->get();
        $cartitem = cart::where('user_id', Auth::id())->get();
        $blog = blog::where('id', $id)->first();

        $review = blogreview::where('blog_id', $id)->get();

        return view('frontend.blog-view', compact('blog', 'review', 'cartitem', 'wishlist'));
    }
    public function blogreview(Request $request)
    {

        $wishlist = wishlist::where('user_id', Auth::id())->get();
        $cartitem = cart::where('user_id', Auth::id())->get();
        $blog = new blogreview;
        $blog->user_id = Auth::id();
        $blog->blog_id = $request->input('blog_id');
        $blog->review = $request->input('review');
        $blog->save();
        return redirect(url('/view-blog', $request->input('blog_id')));

    }



}
