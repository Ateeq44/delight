<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
	use HasFactory;
	protected $table = "sub_categories";
	protected $fillable = [
		'category_id',
		'subcategory',
		'slug',
		'status',
		'popular',
	];

}

