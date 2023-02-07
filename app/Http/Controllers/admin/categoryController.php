<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\File;


class categoryController extends Controller
{
    public function category()
    {
        return view('admin.add-category');
    }

    public function insert(Request $request)
    {
        $category = new category();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('public/upload/category',$filename);
            $category->image = $filename;

        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';

        $category->save();
        return redirect("View-category")->with('status', "Category Added Successfully");

    }
    public function ViewCategory()
    {
        $data = [];
        $data['category'] = category::orderBy('created_at', 'DESC')->get();
        return view('admin.view-category', $data);
    }

    public function delete(Request $request, $id)
    {
        category::destroy(array('id', $id));
        return redirect ('View-category')->with('status', 'Deleted Successfully');
    }

    public function edit(Request $request, $id)
    {
        $category = category::find($id);
        return view('admin.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $category = category::find($id);
        if($request->hasFile('image')){
            $path = 'public/upload/category/'.$category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('public/upload/category',$filename);
            $category->image = $filename;
        }

        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->status = $request->input('status') == TRUE ? '1':'0';
        $category->popular = $request->input('popular') == TRUE ? '1':'0';
        $category->update();
        return redirect('View-category')->with('status', 'Updated Successfully');
    }
}
