<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem; 
use App\Models\Category;


class CartController extends Controller
{
    // Winkelmandje laten zien met totale prijs (Gaby)
    
    
    public function index()
{
    if (!Auth::check()) { return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om je winkelmandje te zien.'); }

    $user = Auth::user();
    $cartItems = CartItem::where('user_id', $user->id)->get();

    $cart = [];
    $totalPrice = 0;

    // Bouw het winkelmandje vanuit de CartItems van de database (Gaby)
    foreach ($cartItems as $item) {
        $product = $item->product;
        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'total' => $item->total,
        ];
        $totalPrice += $product->price * $item->total; // Pak dan de totale prijs van alles in de winkelmandje (Gaby)
    }
    return view('cart.index', compact('cart', 'totalPrice'));
}


    // Product toevoegen aan het winkelmandje (Gaby)
    
public function add(Product $product)
{
   // Je moet eert ingelogd zijn voordat je iets in je winkelmandje kan toevoegen (Gaby)
    if (!Auth::check()) {  return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om producten toe te voegen.');  }
        $user = Auth::user();

    // Zoek naar bestaande cart item voor de gebruiker/ user (Gaby)
    $cartItem = CartItem::where('user_id', $user->id)->where('product_id', $product->id)->first();

    if ($cartItem) { // Verhoog aantal als product al in winkelmandje zit
        $cartItem->total++;
        $cartItem->save();
    } else {
        // Voeg nieuw product toe aan winkelmandje (Gaby)
        CartItem::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'total' => 1,
        ]);
    }
 return redirect()->route('cart.index')->with('success', 'Product toegevoegd aan winkelmandje');
}

    // Verwijder product uit winkelmandje (Gaby)
    public function remove(Product $product)
{
    $user = Auth::user();
    CartItem::where('user_id', $user->id)->where('product_id', $product->id)->delete();
    return redirect()->route('cart.index')->with('success', 'Product verwijderd uit winkelmandje ');
}


    // Functie om aantal producten in winkelmandje te kunnen veranderen (Gaby)
    public function update(Request $request, $id)
{
    $request->validate(['aantal' => 'required|integer|min:1']);

    $user = Auth::user();
    $cartItem = CartItem::where('user_id', $user->id)->where('product_id', $id)->first();

    if ($cartItem) {
        // Werk het aantal bij in de database (Gaby)
        $cartItem->total = $request->aantal;
        $cartItem->save();
    }

    return redirect()->back()->with('success', 'Product bijgewerkt!');
}

  
    // Checkout laten zien met alle gegevens van winkelmandje (Gaby)
public function checkout()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om af te rekenen.');
    }

    $user = Auth::user();
    $cartItems = CartItem::where('user_id', $user->id)->get();

    $cart = [];
    $totalPrice = 0;

    // Bouw het winkelmandje op vanuit de CartItems van de database (Gaby)
    foreach ($cartItems as $item) {
        $product = $item->product;
        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'total' => $item->total,
        ];
        $totalPrice += $product->price * $item->total; // Bereken de totale prijs (Gaby)
    }

    // Toon de checkout pagina met winkelmandgegevens en totale prijs
    return view('cart.checkout', compact('cart', 'totalPrice'));
}

public function webshop()
{
    $products = Product::all(); // Haal alle producten op
    $categories = Category::all(); // Haal alle categorieën op

    // Geef de view terug met zowel producten als categorieën
    return view('webshop.webshop', compact('products', 'categories'));
}}