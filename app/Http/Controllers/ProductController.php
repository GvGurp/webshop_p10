<?php

namespace App\Http\Controllers;


use App\Models\Product; // Ensure this line is correct
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        // Fetch the product from the database using the provided ID
        $product = Product::find($id);

      
        // Return the view with the product variable
        return view('webshop.webShop', compact('product'));
    }

    public function index(){
        $products = product::all();
        return view('/webshop', compact('products'));
    }
}

