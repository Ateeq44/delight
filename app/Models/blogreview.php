<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogreview extends Model
{
    use HasFactory;
    protected $table = 'blogreview';
    protected $fillable = [
        'user_id',
        'blog_id',
        'review',

    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
