<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminProductController;
use App\Models\Category; 
use faker\Factory;  


////////////////////////// Algemene routes //////////////////////////

// Home en informatie pagina's
Route::view('/', 'home')->name('home');
Route::view('/home', 'home')->name('home');
Route::view('/bestellen', 'bestellen')->name('bestellen');
Route::view('/faq', 'faq')->name('faq');
Route::view('/overOns', 'overOns')->name('overOns');

///////////////////////// Account en authenticatie ///////////////////////////

// Authenticatie en account routes
Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'showAccount'])->name('account.show');
    Route::match(['put', 'post'], '/account/update', [AccountController::class, 'update'])->name('account.update');
});

Auth::routes(); // Laravel Authenticatie routes

///////////////////////// Service, zakelijk en bezorgdiensten //////////////////////////

// Service pagina's
Route::view('/service', 'service')->name('service');
Route::view('/zakelijk', 'zakelijk')->name('zakelijk');
Route::view('/bezorgdiensten', 'bezorgdiensten')->name('bezorgdiensten');

// Routes voor verzoeken, alleen toegankelijk voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::post('/requests', [RequestController::class, 'createRequest'])->name('requests.create');
});


/////////////////////// Webshop routes ///////////////////////////
// Webshop overzicht met filters (Gaby)
Route::get('/webshop', [ProductController::class, 'index'])->name('cart.webshop');
Route::get('/adminBewerken', [AdminProductController::class, 'index'])->name('adminBewerken');

/////////////////////////////////////////////////////CRUD///////////////////////////////////////////////////////////////////

// Show product details (Tishanty)
////////////////////////// Webshop routes ///////////////////////////

// Webshop overzicht en filtering
Route::get('/webshop', [ProductController::class, 'index'])->name('webshop');

// Product details en CRUD operaties voor producten
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search', [ProductController::class, 'search'])->name('search.product');
Route::post('adminCreate', function () {
    App\Models\Product::create([
        'name' => request('name'),
        'price' => request('price'),
        'picture' => request('picture'),
        'productInformation' => request('productInformation'),
        'specifications' => request('specifications'),
        'category_id' => 1,
    ]);
    return redirect('webshop');
})->name('adminCreate');
Route::get('/webshop/admincreate', [AdminOrderController::class, 'create'])->name('admin.create');


Route::get('/webshop/adminBewerken/{id}', [AdminProductController::class, 'edit'])->name('adminEditForm');
Route::put('/webshop/adminBewerken/{id}', [AdminProductController::class, 'update'])->name('adminUpdate');




// Delete product (Gaby)
//Route::get('/webshop', [ProductController::class, 'index'])->name('webshop');
// Product bewerken en verwijderen
Route::put('/adminUpdate/{id}', [ProductController::class, 'update'])->name('adminUpdate');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}/delete-confirmation', [ProductController::class, 'showDeleteConfirmation'])->name('products.showDeleteConfirmation');
Route::delete('/products/{id}/confirm-delete', [ProductController::class, 'confirmDelete'])->name('products.confirmDelete');

////////////////////////// Winkelmandje routes ///////////////////////////

// Routes voor winkelmandje functionaliteit, alleen voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::get('/webshop', [CartController::class, 'webshop'])->name('cart.webshop');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

////////////////////////// Order routes ///////////////////////////

// Routes voor bestellingen, toegankelijk voor ingelogde gebruikers
Route::middleware('auth')->group(function () {
    Route::post('/order', [OrderController::class, 'placeOrder'])->name('order.place');
     // Route voor het plaatsen van een bestelling
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    Route::get('/order/success', function () {
        return view('BestellingGeplaatst');
    })->name('order.success');
    

    // Succespagina na het plaatsen van een bestelling
    Route::get('/order/success', function () {
        return view('BestellingGeplaatst');
    })->name('order.success');

    Route::middleware('auth')->group(function () {
        Route::post('/order', [OrderController::class, 'placeOrder'])->name('order.place');
    });
    
});

// Route voor ophalen van productdetails (extern gebruikt)
Route::get('/product-details/{id}', [ProductController::class, 'getProductDetails'])->name('products.details');

///////////////////////////Bestelling plaatsen ///////////////////////////////////


Route::post('/order', [OrderController::class, 'placeOrder'])->name('order.place');


Route::get('/order/success', function () {
    return view('BestellingGeplaatst');
})->name('order.success');

//////////////// Admin bestellingen overzicht /////////////////////
Route::get('/adminOverzicht', [AdminOrderController::class, 'index'])->name('adminOverzicht');
Route::get('/adminOverzicht/{id}', [AdminOrderController::class, 'show'])->name('adminOrderDetails');

Route::get('/search', [ProductSearchController::class, 'search'])->name('product.search');

Route::get('/search-product', [ProductController::class, 'search'])->name('search.product');
