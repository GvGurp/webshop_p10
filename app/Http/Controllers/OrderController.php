<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Importeer het Order-model

class OrderController extends Controller
{
    public function placeOrder(Request $request)
{
    // Minimaliseer de validatie en probeer alleen enkele velden op te slaan
    $order = Order::create([
        'city' => $request->city,
        'street' => $request->street,
        'postcode' => $request->postcode,
        'house_number' => $request->house_number,
        'phone' => $request->phone,
        'payment_method' => $request->payment_method,
        'total_price' => $request->totalPrice,
        'user_password' => bcrypt($request->password),
        'terms_accepted' => true,
    ]);

    return redirect()->route('order.success');
}

    // Functie voor het plaatsen van de bestelling
    // Redirect naar de succespagina


    
   
}
