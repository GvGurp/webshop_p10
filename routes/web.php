<?php



use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use faker\Factory; 

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
    $categories = App\Models\Category::all();
    return view('webshop/adminCreate', compact('categories'));
})->name('adminCreate');

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
    return redirect('webshop/webshop');
});

Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');




////////////////////////////////////////////////////AUTH////////////////////////////////////////////////////////////////////
Auth::routes();

Route::get('/admin/create', [AdminController::class, 'create'])->name('adminCreate')->middleware('auth');
//Route::get('/admin/create', [AdminController::class, 'create'])->name('adminCreate')->middleware('auth');




/////////////////////////////////////////////////CART/////////////////////////////////////////////////////////



// Route voor het tonen van de webshop (met filters)
Route::get('/cart/webshop', [ProductController::class, 'index'])->name('cart.webshop');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
////////////////////////////////////////////////////AUTH////////////////////////////////////////////////////////////////////
Auth::routes();

