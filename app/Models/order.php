<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\orderitem;


class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'payment_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
        'status',
        'message',
        'tracking_no',
        'order_note',
    ];


    public function orderitem()
    {
        return $this->hasMany(orderitem::class);
    }
}
