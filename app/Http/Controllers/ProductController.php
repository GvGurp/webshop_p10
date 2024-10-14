<?php 
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filteren op categorie
        if ($request->has('category') && !empty($request->category)) {
            $query->whereIn('category_id', $request->category); 
        }

        // Filteren op max prijs
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Haal de gefilterde producten op
        $products = $query->with('category')->get(); // Met category om de naam op te halen

        // Haal ook de categorieën om in de view te gebruiken
        $categories = category::all(); // Zorg dat je deze regel hebt

        return view('webshop.webshop', compact('products', 'categories')); // Zorg ervoor dat je $categories hier doorgeeft
    }
}; 