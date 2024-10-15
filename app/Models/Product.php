<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tabel naam (Gaby)

    protected $table = 'product';

    // Inhoud tabel products (Gaby)
    protected $fillable = [
        'name',
        'picture',
        'specifications',
        'price',
        'productInformation',
        'category_id'


    ];

    //Relatie van product op catergory (Gaby)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
