<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AccountController;
use App\Models\Category; 
use faker\Factory;  

////////////////////////// Algemene routes //////////////////////////

Route::view('/', 'home')->name('home');
Route::view('/home', 'home')->name('home');
Route::view('/bestellen', 'bestellen')->name('bestellen');
Route::view('/faq', 'faq')->name('faq');
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'showAccount'])->name('account.show');
    Route::match(['put', 'post'], '/account/update', [AccountController::class, 'update'])->name('account.update');
});

Route::view('/overOns', 'overOns')->name('overOns');

///////////////////////// Routes voor service, zakelijk, verzoeken en bezorgdiensten //////////////////////////

Route::view('/service', 'service')->name('service');
Route::view('/zakelijk', 'zakelijk')->name('zakelijk');
Route::middleware('auth')->group(function () {
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::post('/requests', [RequestController::class, 'createRequest'])->name('requests.create');
});
Route::view('/bezorgdiensten', 'bezorgdiensten')->name('bezorgdiensten');  

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search', [ProductController::class, 'search'])->name('search.product');

/////////////////////// Webshop routes ///////////////////////////

// Webshop overzicht met filters (Gaby)
Route::get('/webshop', [ProductController::class, 'index'])->name('cart.webshop');
Route::get('/adminBewerken', [ProductController::class, 'index'])->name('adminBewerken');

/////////////////////////////////////////////////////CRUD///////////////////////////////////////////////////////////////////

// Show product details (Tishanty)
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

// Update product (Ola)

Route::put('/adminUpdate/{id}', [ProductController::class, 'update'])->name('adminUpdate');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
//Route::get('webshop/adminBewerken/', [ProductController::class, 'edit'])->name('adminBewerken');




// Delete product (Gaby)
Route::get('/webshop', [ProductController::class, 'index'])->name('webshop');
Route::get('/products/{id}/delete-confirmation', [ProductController::class, 'showDeleteConfirmation'])->name('products.showDeleteConfirmation');
Route::delete('/products/{id}/confirm-delete', [ProductController::class, 'confirmDelete'])->name('products.confirmDelete');

/////////////////////// Cart routes met middleware ///////////////////////////

// Winkelmandje alleen beschikbaar voor ingelogde gebruikers (Gaby)
Route::middleware('auth')->group(function () {

    





    Route::get('/webshop', [CartController::class, 'webshop'])->name('cart.webshop');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

/////////////////////// Admin Create route ///////////////////////////
Route::get('/webshop/admincreate', function () {
    $categories = App\Models\Category::all();
    return view('webshop/adminCreate', compact('categories'));
})->name('adminCreate');

/////////////////////// Authenticatie routes ///////////////////////////
Auth::routes();

Route::get('/product-details/{id}', [ProductController::class, 'getProductDetails'])->name('products.details');
//////////////////////Bestelling plaatsen ///////////////////////////////////


Route::post('/order', [OrderController::class, 'placeOrder'])->name('order.place');


Route::get('/order/success', function () {
    return view('BestellingGeplaatst');
})->name('order.success');