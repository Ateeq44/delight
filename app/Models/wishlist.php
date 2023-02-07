<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';
    protected $fillable = [
        'user_id',
        'prod_id',
    ];

    public function wishlistproducts()
    {
        return $this->belongsTo(product::class, 'prod_id', 'id');
    }
}
