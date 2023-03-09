<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
	use HasFactory;
	protected $table = "category";
	protected $fillable = [
		'name',
		'slug',
		'status',
		'popular',
		'image',

	];

	public function sucategory()
	{
		return $this->belongsTo(SubCategory::class,'category_id', 'id');
	}
}