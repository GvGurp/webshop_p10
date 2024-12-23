<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use HasFactory;


class CartItem extends Model
{

    
    // Specificeer de juiste tabelnaam (Gaby)
    protected $table = 'cartItems';
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
