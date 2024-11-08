<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Importeer het Order-model

class OrderController extends Controller
{
    public function placeOrder(Request $request)
{
    // Validatie van het formulier(Gaby)
    $request->validate([
        'city' => 'required|string',
        'street' => 'required|string',
        'postcode' => 'required|string',
        'house_number' => 'required|string',
        'phone' => 'required|string',
        'payment_method' => 'required|string',
        'password' => 'required|string',
        'terms' => 'accepted',
        'totalPrice' => 'required|numeric' // Voeg validatie voor totalPrice toe(Gaby)
    ]);

    // Maak een nieuwe order aan en sla deze op in de database (Gaby)
    $order = Order::create([
        'city' => $request->city,
        'street' => $request->street,
        'postcode' => $request->postcode,
        'house_number' => $request->house_number,
        'phone' => $request->phone,
        'payment_method' => $request->payment_method,
        'total_price' => $request->input('totalPrice'), // Haal totalPrice op uit het formulier(Gaby)
        'user_password' => bcrypt($request->password),
        'terms_accepted' => true,
    ]);

    return redirect()->route('order.success');
}

    // Functie voor het plaatsen van de bestelling
    // Redirect naar de succespagina


    
   
}


    
