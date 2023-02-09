<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\product;


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

}
