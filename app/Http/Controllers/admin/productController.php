<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class productController extends Controller
{
    public function ViewProduct()
    {
        $product = product::orderBy('created_at', 'DESC')->get();
        return view('admin.product.view', compact('product'));
    }
    public function product()
    {
        $category = category::all();
        return view('admin.product.add', compact('category'));
    }
    public function insert(Request $request)
    {
        $product = new product();
        $files = [];
        // dd($request->hasfile('image'));
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move('public/upload/product', $name);
                $files[] = $name;
            }
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = Str::slug($request->name);
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending') == TRUE ? '1':'0';
        $product->image = json_encode($files);
        $product->save();
        return redirect("view-product")->with('status', "Product Added Successfully");

    }
    public function edit(Request $request, $id)
    {
        $category = category::all();
        $product = product::find($id);
        return view('admin.product/edit', compact('product', 'category'));
    }

    public function update(Request $request, $id)
    {

        $product = product::find($id);
        $files = [];
        // dd($request->hasfile('image'));
        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move('public/upload/product', $name);
                $files[] = $name;
            }
        }

        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->tax = $request->input('tax');
        $product->qty = $request->input('qty');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->status = $request->input('status') == TRUE ? '1':'0';
        $product->trending = $request->input('trending') == TRUE ? '1':'0';
        $product->image = json_encode($files);
        $product->update();
        return redirect('view-product')->with('status', 'Updated Successfully');
    }
    public function delete(Request $request, $id)
    {
        product::destroy(array('id', $id));
        return redirect ('view-product')->with('status', 'Deleted Successfully');
    }
    public function view(Request $request, $id)
    {
        $category = category::find($id);
        $product = product::with('category')->find($id);
        return view('admin.product.product-view', compact('product', 'category'));
    }

}
