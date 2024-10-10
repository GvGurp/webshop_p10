<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


// De routes die de pagina verbinden via de navigatie

////////////////////////////De routes die de pagina verbinden via de navigatie

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

/////////////////////////////////////////////routes voor pagina's in mapje webshop (Gaby)
Route::get('/webshop/webshop', function () {
    return view('webshop/webshop');
})->name('webshop/webshop');

Route::get('/webshop/admincreate', function () {
    return view('webshop/adminCreate');
})->name('webshop/adminCreate');

/////////////////////////////////////////////////////CRUD///////////////////////////////////////////////////////////////////


/// show (Tishanty)///

Route::get('webshop', function () {
    $products = \App\Models\product::all();
    return view('webshop/webshop', compact('product'));
});


//create
Route::post('webshop', function () {
    \App\Models\product::create([
        'name' => request('name'),
        'price' => request('price'),
        'product_id' => 1
    ]);
    return redirect('/');
});



////////////////////////////////////////////////////AUTH////////////////////////////////////////////////////////////////////
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/////////////////////////////////////////////////CART/////////////////////////////////////////////////////////


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

