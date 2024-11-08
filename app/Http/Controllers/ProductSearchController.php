<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductSearchController extends Controller
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

        // Retourneer de resultaten naar dezelfde view (webshop.blade.php)
        return view('webshop.webshop', compact('products'));
    }
}
