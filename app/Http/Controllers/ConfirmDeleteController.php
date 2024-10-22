<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConfirmDeleteController extends Controller
{
    public function confirmDelete(Request $request, $id)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
        'confirm_delete' => 'accepted'
    ]);

    // Controleer of de ingevoerde gebruikersnaam en wachtwoord overeenkomen met de huidige gebruiker (Gaby)
    if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
        // Verwijder het product als de gegevens kloppen (Gaby)
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product succesvol verwijderd.');
    }

    return back()->withErrors(['username' => 'Onjuiste gebruikersnaam of wachtwoord.']);
}

}
