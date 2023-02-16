<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\category;
use Illuminate\Support\Str;
class SubCategoryController extends Controller
{
	public function create()
	{
		$category = category::all();
		return view('admin.subcategory.add-subcategory', compact('category'));

	}

	public function store(Request $request)
	{
		$subcategory = new SubCategory();
		$subcategory->category_id = $request->input('cate_id');
		$subcategory->subcategory = $request->input('subcategory');
		$subcategory->slug = Str::slug($request->name);
		$subcategory->status = $request->input('status') == TRUE ? '1':'0';
		$subcategory->popular = $request->input('popular') == TRUE ? '1':'0';
		$subcategory->save();
		return view('admin.subcategory.view-subcategory');
	}

	public function show()
	{
		$data = [];
		$data['subcategory'] = SubCategory::orderBy('created_at', 'DESC')->get();
		return view('admin.subcategory.view-subcategory', $data);    
	}

	public function edit(Request $request, $id)
    {
		$category = category::all();
        $SubCategory = SubCategory::find($id);
        return view('admin.subcategory.edit', compact('SubCategory', 'category'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->category_id = $request->input('cate_id');
		$subcategory->subcategory = $request->input('subcategory');
		$subcategory->slug = $request->input('slug');
		$subcategory->status = $request->input('status') == TRUE ? '1':'0';
		$subcategory->popular = $request->input('popular') == TRUE ? '1':'0';
        $subcategory->update();
        return redirect('View-subcategory')->with('status', 'Updated Successfully');
    }

	public function delete(Request $request, $id)
	{
		SubCategory::destroy(array('id', $id));
		return redirect ('View-subcategory')->with('status', 'Deleted Successfully');
	}
}