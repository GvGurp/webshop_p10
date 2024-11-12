<?php 
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Haal alle producten op, met filters voor categorie en prijs
    public function index(Request $request)
    {
       
        $products = Product::all(); // Adjust this to apply any filters you want
        $categories = Category::all(); // Retrieve all categories

        return view('webshop.webshop', compact('products', 'categories'));
    
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
        $categories = Category::all(); 

        return view('webshop.webshop', compact('products', 'categories'));
    }

    public function showDeleteConfirmation($id)
    {
        // Haal het product op dat verwijderd gaat worden (Gaby)
        $product = Product::findOrFail($id);

        // Stuur het product door naar de AdminDelete view (Gaby)
        return view('webshop/adminDelete', compact('product'));
    }

    public function confirmDelete(Request $request, $id)
{
    // Valideer de gebruikersnaam en het wachtwoord
    $credentials = $request->only('email', 'password'); // Zorg ervoor dat je de juiste velden gebruikt

    if (Auth::attempt($credentials)) {
        // Haal het product op dat verwijderd moet worden
        $product = Product::find($id); // Hier gebruik je find() in plaats van findOrFail()

        if (!$product) {
            return redirect()->route('adminBewerken')->with('error', 'Product niet gevonden.');
        }

        $product->delete(); // Verwijder het product

        // Geef een succesmelding terug
        return redirect()->route('adminBewerken')->with('success', 'Product succesvol verwijderd.');
    }

    // Geef een foutmelding terug als de validatie faalt
    return redirect()->back()->with('error', 'Ongeldige email of wachtwoord.'); // This will redirect back with an error message.
}

}
