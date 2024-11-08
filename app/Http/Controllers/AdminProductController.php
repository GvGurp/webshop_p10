<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('webshop.adminBewerken', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        if (!$product) {
            return redirect()->route('webshop.adminBewerken')->with('error', 'Product niet gevonden');
        }

        return view('webshop.adminUpdate', compact('product', 'categories'));
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

        return redirect()->route('admin.Bewerken')->with('success', 'Product succesvol bijgewerkt.');
    }
}
