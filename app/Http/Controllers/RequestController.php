<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RequestController extends Controller
{
    public function index()
    {
        return view('verzoeken'); // Verander dit naar jouw Blade bestand
    }

    public function createRequest(HttpRequest $request)
    {
        // Valideer de gegevens
        $request->validate([
            'omschrijving' => 'required|string',
            'typemachine' => 'required|string',
            'garantie' => 'required|string',
            'datum' => 'required|date',
            'password' => 'required|string',
        ]);

        $user = Auth::user();

        // Wachtwoord valideren
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Het wachtwoord is onjuist.'])->withInput();
        }

        // Verzoek aanmaken
        Request::create([
            'user_id' => $user->id,
            'omschrijving' => $request->omschrijving,
            'typemachine' => $request->typemachine,
            'garantie' => $request->garantie,
            'datum' => $request->datum,
        ]);

        return redirect()->route('requests.index')->with('status', 'Verzoek succesvol aangemaakt.'); // Stuur terug naar het formulier met succesbericht
    }
}

