<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    // Methode om de accountpagina weer te geven
    public function showAccount()
    {
        $user = Auth::user(); // Haal de ingelogde gebruiker op
        return view('account', compact('user')); // Geef de 'account' view weer met de gebruiker
    }

    // Methode om gebruikersgegevens bij te werken
    public function update(Request $request)
{
    $user = Auth::user();

    // Validate the data
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'phonenumber' => 'required|string|max:15',
        'email' => 'required|string|email|max:255',
    ]);

    // Update user information
    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->phonenumber = $request->phonenumber;
    $user->email = $request->email;
    $user->save();

    return redirect()->route('account.show')->with('success', 'Gegevens zijn succesvol bijgewerkt.');
}

}
