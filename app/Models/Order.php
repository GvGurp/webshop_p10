<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';


protected $fillable = [
    'city',
    'street',
    'postcode',
    'house_number',
    'phone',
    'payment_method',
    'total_price',
    'user_password',
    'terms_accepted',
];

}