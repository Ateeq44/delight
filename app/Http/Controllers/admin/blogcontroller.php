<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\blogcategory;
use App\Models\category;
use App\Models\blogreview;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class blogcontroller extends Controller
{
    public function addBlog()
    {
        return view('admin.add-blog');
    }

    public function insert(Request $request)
    {
        $blog = new blog();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('public/upload/blog',$filename);
            $blog->image = $filename;

        }
        // $blog->cate_id = $request->input('category_id');
        $blog->name = $request->input('name');
        $blog->slug = Str::slug($request->name);
        $blog->blog = $request->input('blog');
        $blog->user_id = $request->input('author');
        $blog->status = $request->input('status') == TRUE ? '1':'0';
        $blog->popular = $request->input('popular') == TRUE ? '1':'0';

        $blog->save();
        return redirect("add-blog")->with('status', "Blog Added Successfully");

    }

    public function edit_blog(Request $request, $id)
    {
        $blog = blog::find($id);
        return view('admin.edit-blog', compact('blog'));
    }
    public function update_blog(Request $request, $id)
    {
        $blog = blog::find($id);
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename = time().'.'. $extension;
            $file->move('public/upload/blog',$filename);
            $blog->image = $filename;

        }
        // $blog->cate_id = $request->input('category_id');
        $blog->name = $request->input('name');
        $blog->slug = $request->input('slug');
        $blog->blog = $request->input('blog');
        $blog->user_id = $request->input('author');
        $blog->status = $request->input('status') == TRUE ? '1':'0';
        $blog->popular = $request->input('popular') == TRUE ? '1':'0';

        $blog->update();
        return redirect('/view-blog')->with('status', "Blog Added Successfully");
    }
    public function viewBlog()
    {
        $data = [];
        $data['collection'] = blog::all();
        return view('admin.view-blog', $data);
    }

    public function delete(Request $request, $id)
    {
        blog::destroy(array('id', $id));
        return redirect ('view-blog')->with('status', 'Deleted Successfully');
    }

    // Blog category

    public function addcategory()
    {
        return view('admin.blog-category.add');
    }

    public function insertcategory(Request $request)
    {
        $blog = new blog();
        $blog->name = $request->input('name');
        $blog->status = $request->input('status') == TRUE ? '1':'0';
        $blog->popular = $request->input('popular') == TRUE ? '1':'0';

        $blog->save();
        return redirect("add-vaegory")->with('status', "Blog Added Successfully");

    }

    public function viewcategory()
    {
        $data = [];
        $data['collection'] = blogcategory::all();
        return view('admin.view-category', $data);
    }



    public function deletecategory(Request $request, $id)
    {
        blogcategory::destroy(array('id', $id));
        return redirect ('view-category')->with('status', 'Deleted Successfully');
    }

}
