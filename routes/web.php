<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/paypal', function () {
    return view('paypal');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::resource('products','App\Http\Controllers\ProductsController');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('orders','App\Http\Controllers\OrderController');
  });
Route::get('/Products/search', [App\Http\Controllers\ProductsController::class, 'search'])->name('search');
