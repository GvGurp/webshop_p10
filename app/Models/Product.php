<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tabel naam (Gaby)
    protected $table = 'products'; 

    // Inhoud tabel products (Gaby)
    protected $fillable = [
        'name',
        'picture',
        'specifications',
        'prize',
        'productInformation',


    ];

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
