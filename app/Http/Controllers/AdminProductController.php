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
    // Validate and update the product logic
    $product = Product::findOrFail($id);

    // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required',
        'productInformation' => 'nullable|string',
        'specifications' => 'nullable|string',
        'picture' => 'nullable|image|max:2048',
    ]);

    // Update the product fields
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->category_id = $request->input('category_id');
    $product->productInformation = $request->input('productInformation');
    $product->specifications = $request->input('specifications');

    // Handle image upload if present
    if ($request->hasFile('picture')) {
        if ($product->picture) {
            Storage::disk('public')->delete($product->picture); // Delete old image
        }
        $imagePath = $request->file('picture')->store('products', 'public');
        $product->picture = $imagePath;
    }

    // Save the updated product
    $product->save();

    // Redirect back with success message
    return redirect()->route('adminEditForm', ['id' => $product->id])->with('success', 'Product updated successfully!');
}
}
