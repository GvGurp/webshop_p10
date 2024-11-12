<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductSearchController extends Controller
{
    public function search(Request $request)
    {
        // Haal de zoekopdracht op
        $searchQuery = $request->input('query');

        // Zoek naar producten die overeenkomen met de naam, productinformatie of specificaties
        $products = Product::where('name', 'like', '%' . $searchQuery . '%')
            ->orWhere('productInformation', 'like', '%' . $searchQuery . '%')
            ->orWhere('specifications', 'like', '%' . $searchQuery . '%')
            ->get();

        return view('webshop.adminBewerken', compact('products'));
    }
}
