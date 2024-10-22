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
Route::view('/overOns', 'overOns')->name('overOns');

///////////////////////// Routes voor service, zakelijk, verzoeken en bezorgdiensten //////////////////////////

// Deze views bevinden zich in resources/views
Route::view('/service', 'service')->name('service');
Route::view('/zakelijk', 'zakelijk')->name('zakelijk');
Route::view('/verzoeken', 'verzoeken')->name('verzoeken');
Route::view('/bezorgdiensten', 'bezorgdiensten')->name('bezorgdiensten');  // Deze route toegevoegd

/////////////////////// Webshop routes ///////////////////////////

// Webshop overzicht met filters (Gaby)
Route::get('/webshop', [ProductController::class, 'index'])->name('cart.webshop');

/////////////////////////////////////////////////////CRUD///////////////////////////////////////////////////////////////////

/// show (Tishanty)///

Route::get('webshop', function () {
    $categories = Category::all();
    $products = App\Models\product::all();
    return view('webshop/webshop', compact('products', 'categories'));
});

Route::post('adminCreate', function () {
    App\Models\product::Create([
        'name' => request('name'),
        'price' => request('price'),
        'picture' => request('picture'),
        'productInformation' => request('productInformation'),
        'specifications' => request('specifications'),
        'category_id' => 1,
    ]);
    return redirect('webshop');
});

Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

///////////// update (Ola) //////////////////////////////

Route::get('webshop/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('admin/products/{id}', [ProductController::class, 'update'])->name('products.update');

/////////////////////// Cart routes met middleware ///////////////////////////

// Winkelmandje alleen beschikbaar voor ingelogde gebruikers (Gaby)
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
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
