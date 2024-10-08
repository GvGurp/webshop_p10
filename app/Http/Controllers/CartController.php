<?php
 
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session; 

class CartController extends Controller
{
    // Winkelmandje laten zien met totale prijs (Gaby)
    public function index()
    {
        $cart = session()->get('cart', []);
        $totalPrice = array_sum(array_column($cart, 'price'));
        return view('cart.index', compact('cart', 'totalPrice'));
    }

    // Product toevoegen of meer erin zetten met behulp van sessions (Gaby)
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        // Hier is product hoeveelheid verhogen met een if (Gaby)
        if(isset($cart[$product->id])) {
            $cart[$product->id]['total']++;
        } else {
            // Als je product niet hebt dan kan je het toevoegen als else (Gaby)
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'total' => 1
            ];
        }
         
        /// Tekst laten zien als het gelukt is (Gaby)
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product toegevoegd aan winkelmandje');
    }

    // Verwijder product uit winkelmandje en ga terug naar cart pagina (Gaby)
    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product verwijderd uit winkelmandje');
    }

    // Laat chechout formulier zien (Gaby)
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $totalPrice = array_sum(array_column($cart, 'price'));
        return view('cart.checkout', compact('cart', 'totalPrice'));
    }
}
