<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class product extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $fillable = [
        'cate_id',
        'sub_cate_id',
        'name',
        'slug',
        'image',
        'description',
        'original_price',
        'selling_price',
        'qty',
        'tax',
        'size',
        'color',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(category::class,'cate_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_cate_id', 'id');
    }
}
