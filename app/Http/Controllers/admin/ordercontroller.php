<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class ordercontroller extends Controller
{
    public function index()
    {
        $orders = order::orderBy('created_at', 'DESC')->where('status', '0')->get();
        return view('admin.order.view', compact('orders'));
    }

    public function view($id)
    {
        $orders = order::where('id', $id)->first();
        return view('admin.order.view-single', compact('orders'));
    }

    public function updateorder(Request $request, $id)
    {
        $orders = order::find($id);
        $orders->status = $request->input('status');
        $orders->update();
        return redirect('orders')->with('status', 'Order Updated Successfully');
    }

    public function orderAccepted()
    {
        $orders = order::orderBy('created_at', 'DESC')->where('status', '1')->get();
        return view('admin.order.orderAccepted', compact('orders'));

    }
    public function orderPacked()
    {
        $orders = order::orderBy('created_at', 'DESC')->where('status', '2')->get();
        return view('admin.order.orderPacked', compact('orders'));

    }
    public function orderShipped()
    {
        $orders = order::orderBy('created_at', 'DESC')->where('status', '3')->get();
        return view('admin.order.orderShipped', compact('orders'));

    }
    public function orderDelivered()
    {
        $orders = order::orderBy('created_at', 'DESC')->where('status', '4')->get();
        return view('admin.order.orderDelivered', compact('orders'));

    }

}
