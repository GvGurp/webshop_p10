<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Winkelmandje laten zien met totale prijs (Gaby)
    public function index()
    {
        // Controleer of de gebruiker is ingelogd (Gaby)
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om je winkelmandje te zien.');
        }

        // Winkelmandje ophalen van de ingelogde gebruiker (Gaby)
        $cart = session()->get('cart_' . Auth::id(), []);
        $totalPrice = array_sum(array_column($cart, 'price'));
        return view('cart.index', compact('cart', 'totalPrice'));
    }

    // Product toevoegen aan het winkelmandje (Gaby)
    public function add(Product $product)
    {
        // Controleer of de gebruiker is ingelogd (Gaby)
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om producten toe te voegen.');
        }

        $cart = session()->get('cart_' . Auth::id(), []);

        // Verhoog het aantal als het product al in het winkelmandje zit (Gaby)
        if (isset($cart[$product->id])) {
            $cart[$product->id]['total']++;
        } else {
            // Voeg product toe als het nog niet in het winkelmandje zit (Gaby)
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'total' => 1
            ];
        }

        // Winkelmandje opslaan in de sessie van de gebruiker (Gaby)
        session()->put('cart_' . Auth::id(), $cart);
        return redirect()->route('cart.index')->with('success', 'Product toegevoegd aan winkelmandje');
    }

    // Verwijder product uit winkelmandje (Gaby)
    public function remove(Product $product)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om producten te verwijderen.');
        }

        $cart = session()->get('cart_' . Auth::id(), []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart_' . Auth::id(), $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product verwijderd uit winkelmandje');
    }

    // Checkout laten zien (Gaby)
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om af te rekenen.');
        }

        $cart = session()->get('cart_' . Auth::id(), []);
        $totalPrice = array_sum(array_column($cart, 'price'));
        return view('cart.checkout', compact('cart', 'totalPrice'));
    }
}
