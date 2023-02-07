<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\contact;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class contactcontroller extends Controller
{
    public function contact(Request $request)
    {
        $cartitem = cart::where('user_id', Auth::id())->get();
        $wishlist = wishlist::where('user_id', Auth::id())->get();

        return view('frontend.contact', compact('cartitem', 'wishlist'));
    }

    public function contactpost(Request $request)
    {
        $contact = new contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->save();
        return redirect('contact')->with('status', 'Message Delivered Successfully');

    }
}
