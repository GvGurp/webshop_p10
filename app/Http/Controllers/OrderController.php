<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Importeer het Order-model

class OrderController extends Controller
{
    // Functie voor het plaatsen van de bestelling
    public function placeOrder(Request $request)
{
    // Validatie van het formulier
    $request->validate([
        'city' => 'required|string',
        'street' => 'required|string',
        'postcode' => 'required|string',
        'house_number' => 'required|string',
        'phone' => 'required|string',
        'payment_method' => 'required|string',
        'password' => 'required|string',
        'terms' => 'accepted',
        'totalPrice' => 'required|numeric' // Voeg validatie voor totalPrice toe
    ]);

    // Maak een nieuwe order aan en sla deze op in de database
    $order = Order::create([
        'city' => $request->city,
        'street' => $request->street,
        'postcode' => $request->postcode,
        'house_number' => $request->house_number,
        'phone' => $request->phone,
        'payment_method' => $request->payment_method,
        'total_price' => $request->input('totalPrice'), // Haal totalPrice op uit het formulier
        'user_password' => bcrypt($request->password),
        'terms_accepted' => true,
    ]);

    // Redirect naar een succespagina
    return view('BestellingGeplaatst');
}

    
}