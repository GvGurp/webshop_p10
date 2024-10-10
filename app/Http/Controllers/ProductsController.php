<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = product::all();
        return view('/webshop', compact('products'));
    }
}
