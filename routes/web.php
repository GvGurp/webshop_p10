<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::get('/bestellen', function () {
    return view('bestellen');
})->name('bestellen');


Route::get('/bezorgdiensten', function () {
    return view('bezorgdiensten');
})->name('bezorgdiensten');


Route::get('/verzoeken', function () {
    return view('verzoeken');
})->name('verzoeken');


Route::get('/faq', function () {
    return view('faq');
})->name('faq');


Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/loginorsignup', function () {
    return view('loginorsignup');
})->name('loginorsignup');


Route::get('/overons', function () {
    return view('overOns');
})->name('overOns');


Route::get('/registration', function () {
    return view('registration');
})->name('registration');


Route::get('/service', function () {
    return view('service');
})->name('service');

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/zakelijk', function () {
    return view('zakelijk');
})->name('zakelijk');

// routes voor pagina's in mapje webshop (Gaby)
Route::get('/webshop/webshop', function () {
    return view('webshop/webshop');
})->name('webshop/webshop');

Route::get('/webshop/admincreate', function () {
    return view('webshop/adminCreate');
})->name('webshop/adminCreate');



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::post('/login', function (Request $request) {
    if (!$request->has(['Naam', 'password', 'email'])) {
        return "Geen naam, wachtwoord of e-mailadres ingevoerd";
    }

    $naam = filter_var(trim($request->input('Naam')), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($request->input('email')), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($request->input('password')), FILTER_SANITIZE_STRING);

    $user = DB::table('users')
                ->where('naam', $naam)
                ->where('email', $email)
                ->where('password', $password)
                ->first();

    if (!$user) {
        return "Onjuiste gebruikersnaam of wachtwoord";
    }

    Session::put('idvanklant', $user->id);
    Session::put('user', $user);

    if ($user->role === 'admin') {
        Session::put('is_admin', true);
    }

    setcookie('user', session()->getId(), time() + (86400 * 30 * 5), "/");

    return redirect()->route('home');
})->name('login.submit');


Route::view('/request', 'request')->name('request.form');

Route::post('/request', function (Request $request) {
    if (!Session::has('user')) {
        return redirect()->route('login.form');
    }

    $idvanklant = Session::get('idvanklant');

    $defect = $request->input('defect');
    $machine = $request->input('machine');
    $garantie = $request->input('garantie');
    $datum = $request->input('datum');

    $user_exists = DB::table('users')->where('id', $idvanklant)->exists();

    if (!$user_exists) {
        return "Fout: De gebruiker van idvanklant = $idvanklant bestaat niet in de gebruikerstabel.";
    }

    $photo_path = "";
    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $photo_path = $request->file('photo')->store('uploads');
    }

    $inserted = DB::table('requests')->insert([
        'idvanklant' => $idvanklant,
        'typemachine' => $machine,
        'garantie' => $garantie,
        'datum' => $datum,
        'photo_path' => $photo_path,
        'omschrijving' => $defect
    ]);

    if ($inserted) {
        return "Verzoek succesvol verzonden";
    } else {
        return "Fout: Het verzoek kon niet worden verzonden";
    }
})->name('request.submit');


Route::get('/logout', function () {
    Session::flush();
    return redirect()->route('loginorsignup');
})->name('logout');

/////////////////////////////////////////////////////CRUD///////////////////////////////////////////////////////////////////
