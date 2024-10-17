<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Category; 
use faker\Factory;  

////////////////////////// Algemene routes //////////////////////////

Route::view('/', 'home')->name('home');
Route::view('/home', 'home')->name('home');
Route::view('/bestellen', 'bestellen')->name('bestellen');
Route::view('/faq', 'faq')->name('faq');
Route::view('/account', 'account')->name('account');
Route::view('/overons', 'overOns')->name('overOns');

///////////////////////// Routes voor service, zakelijk, verzoeken en bezorgdiensten //////////////////////////

// Deze views bevinden zich in resources/views
Route::view('/service', 'service')->name('service');
Route::view('/zakelijk', 'zakelijk')->name('zakelijk');
Route::view('/verzoeken', 'verzoeken')->name('verzoeken');
Route::view('/bezorgdiensten', 'bezorgdiensten')->name('bezorgdiensten');  // Deze route toegevoegd

/////////////////////// Webshop routes ///////////////////////////

// Webshop overzicht met filters (Gaby)
Route::get('/webshop', [ProductController::class, 'index'])->name('cart.webshop');

// Product details pagina
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

/////////////////////// Cart routes met middleware ///////////////////////////

// Winkelmandje alleen beschikbaar voor ingelogde gebruikers (Gaby)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

/////////////////////// Admin Create route ///////////////////////////

//Route::get('/admin/create', [AdminController::class, 'create'])->name('adminCreate')->middleware('auth');

Route::get('/webshop/admincreate', function () {
    $categories = App\Models\Category::all();
    return view('webshop/adminCreate', compact('categories'));
})->name('adminCreate');

/////////////////////// Authenticatie routes ///////////////////////////

Auth::routes();
