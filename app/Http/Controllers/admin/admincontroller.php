<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\details;


class admincontroller extends Controller
{
    public function dashboard()
    {
        $product = product::all();
        $orders = order::orderBy('created_at', 'DESC')->where('status', '0')->take(5)->get();

        return view('admin.dashboard', compact('product', 'orders'));
    }


    public function users()
    {
        $user = User::all();
        return view('admin.user.user', compact('user'));
    }

    public function view($id)
    {
        $user = user::find($id);
        return view('admin.user.view', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = user::find($id);
        $user->role_as = $request->input('role') == TRUE ? '1':'0';
        $user->update();
        return redirect('users')->with('status', 'Updated Successfully');
    }

    public function detail()
    {
        return view('admin.details.details');
    }

    public function submit_detail(Request $request)
    {
        $details = new details();
        $details->color = $request->input('color');
        $details->size = $request->input('size');
        $details->save();
        return redirect(url('detail'))->with('status', 'Details Added Successfully');
    }

    public function view_detail()
    {
        $data = [];
        $data['details'] = details::get();
        return view('admin.details.view-details', $data);
    }
    public function details_destroy($id)
    {
        details::destroy(array('id', $id));
        return view('admin.details.view-details')->with('status', 'Deleted Successfully');
    }
}
