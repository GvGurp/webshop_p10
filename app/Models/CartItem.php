<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class CartItem extends Model
{
    protected $fillable = ['user_id', 'product_id', 'total'];

    public function product()
    {
        return $this->belongsTo(Product::class);  // Koppelt een cart_item aan een product
    }

    public function user()
    {
        return $this->belongsTo(User::class);  // Koppelt een cart_item aan een gebruiker
    }
}
