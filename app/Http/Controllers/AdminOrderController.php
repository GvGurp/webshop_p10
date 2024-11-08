<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();  // Haal alle bestellingen op
        return view('webshop.adminOverzicht', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);  // Haal bestelling op op basis van ID
        return view('webshop.adminOrderDetails', compact('order'));
    }
}
