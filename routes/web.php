<?php



use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;


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
    $categories = \App\Models\Category::all();
    return view('webshop/adminCreate', compact('categories'));
})->name('webshop/adminCreate');

/////////////////////////////////////////////////////CRUD///////////////////////////////////////////////////////////////////


/// show (Tishanty)///

Route::get('adminCreate', function () {
    $products = \App\Models\product::all();
    return view('webshop/adminCreate', compact('products'));
});


//create crud//
Route::post('adminCreate', function () {
    \App\Models\product::Create([
        'name' => request('name'),
        'price' => request('price'),
        'picture' => request('picture'),
        'productInformation' => request('productInformation'),
        'specifications' => request('specifications'),
        'category_id' => 1,
    ]);
    return redirect('webshop/webshop');
});


////////////////////////////////////////////////////AUTH////////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/admin/create', [AdminController::class, 'create'])->name('adminCreate')->middleware('auth');


//create
Route::post('webshop', function () {
    \App\Models\product::create([
        'name' => request('name'),
        'price' => request('price'),
        'product_id' => 1
    ]);
    return redirect('/');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/////////////////////////////////////////////////CART/////////////////////////////////////////////////////////
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/webshop/webshop', function () {
    return view('webshop/webshop');
})->name('webshop.webshop');


// Route voor het tonen van de webshop (met filters)
Route::get('/cart/webshop', [ProductController::class, 'index'])->name('cart.webshop');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
////////////////////////////////////////////////////AUTH////////////////////////////////////////////////////////////////////
Auth::routes();
