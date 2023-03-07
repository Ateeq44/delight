<?php
use App\Http\Controllers\Controller;
use App\Models\category;

if (!function_exists('index')){
	
	function all_category()
	{
		$data = [];
		$data['$all_category'] = category::where('status', '1')->get();
		return $data;
	}
}


