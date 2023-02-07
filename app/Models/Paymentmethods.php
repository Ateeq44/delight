<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentmethods extends Model
{
    use HasFactory;
    protected $table = 'payments_methods';
    protected $fillable = [
        'user_id',
        'card_name',
        'card_number',
        'cvc',
        'date_exp',
        'year_exp',
    ];
}
