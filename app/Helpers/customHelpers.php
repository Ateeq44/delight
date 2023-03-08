<?php
	
use App\Models\category;
	

function category() {
	$all_category = category::where('status', '1')->get();
}