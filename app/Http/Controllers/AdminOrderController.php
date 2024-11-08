<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
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
    public function create()
    {
        $categories = Category::all();

        // Pass categories to the view
        return view('webshop.adminCreate', compact('categories'));
    }
}
