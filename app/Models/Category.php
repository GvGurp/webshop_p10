<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
   use HasFactory;
   protected $table = 'category';
   public $timestamps = false;  // Geen timestamps in deze tabel

    protected $fillable = [
        'name',
    ];

    // Relatie van catergory op products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
