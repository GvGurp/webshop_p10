<?php 
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function show($id)
    {
    $product = Product::findOrFail($id);
    return response()->json($product);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Zoek naar producten die overeenkomen met de query
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($products);
    }

    public function getProductDetails($id){
        // Haal het product op met het gegeven ID of geef een 404-fout terug
        $product = Product::findOrFail($id);
        
        // Geef het product als JSON terug
        return response()->json($product);
        }

        
    // Haal alle producten op, met filters voor categorie en prijs
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
        $categories = Category::all(); 

        return view('webshop.webshop', compact('products', 'categories'));
    }


    public function edit($id)
    {
    // Haal het product op met de opgegeven ID
    $product = Product::findOrFail($id);

    // Haal alle categorieën op voor de dropdown
    $categories = Category::all();

    // Geef de view door met het product en de categorieën
    return view('adminBewerken', compact('product', 'categories'));
    }


public function update(Request $request, $id)
{
    // Validatie van de invoer
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'productInformation' => 'nullable|string',
        'specifications' => 'nullable|string',
        'picture' => 'nullable|image|max:2048' // Validatie voor de afbeelding
    ]);

    // Haal het product op
    $product = Product::findOrFail($id);

    // Update de productinformatie
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->category_id = $request->input('category_id');
    $product->productInformation = $request->input('productInformation');
    $product->specifications = $request->input('specifications');

    // Verwerk de afbeelding indien deze is geüpload
    if ($request->hasFile('picture')) {
        // Verwijder de oude afbeelding als deze bestaat
        if ($product->picture) {
            Storage::disk('public')->delete($product->picture);
        }
        $imagePath = $request->file('picture')->store('products', 'public');
        $product->picture = $imagePath;
    }

    // Sla de wijzigingen op in de database
    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Product succesvol bijgewerkt.');
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
            return redirect()->route('webshop')->with('error', 'Product niet gevonden.');
        }

        $product->delete(); // Verwijder het product

        // Geef een succesmelding terug
        return redirect()->route('webshop')->with('success', 'Product succesvol verwijderd.');
    }

    // Geef een foutmelding terug als de validatie faalt
    return redirect()->back()->with('error', 'Ongeldige email of wachtwoord.'); // This will redirect back with an error message.
}

}
