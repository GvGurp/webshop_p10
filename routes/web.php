<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;



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




////////////////////////////////////////////////////AUTH////////////////////////////////////////////////////////////////////
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

