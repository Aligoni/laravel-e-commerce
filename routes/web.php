<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('landing');
})->middleware('customer')->name('/');

Route::get('/products', 
    [App\Http\Controllers\ProductController::class, 'index'])->middleware('customer')->name('products');
    
Route::get('/products/{id}', 
    [App\Http\Controllers\ProductController::class, 'show'])->middleware('customer');
        
Route::post('/products/{id}', 
    [App\Http\Controllers\ProductController::class, 'addToCart'])->middleware(['auth']);
    
Route::delete('/products/{id}', 
    [App\Http\Controllers\ProductController::class, 'removeFromCart'])->middleware(['auth']);

Route::get('/cart', 
    [App\Http\Controllers\CartController::class, 'index'])->middleware('auth')->name('cart');

Route::get('/cart/checkout', 
    [App\Http\Controllers\CartController::class, 'checkout'])->middleware('auth')->name('cart.checkout');
    
Route::post('/cart/checkout', 
    [App\Http\Controllers\CartController::class, 'placeOrder'])->middleware('auth');
    
Route::get('/admin/login', 
    [App\Http\Controllers\Admin\LoginController::class, 'create'])->middleware('admin')->name('admin.login');

Route::post('/admin/login', 
    [App\Http\Controllers\Admin\LoginController::class, 'store']);

Route::post('/admin/logout', 
    [App\Http\Controllers\Admin\LoginController::class, 'destroy'])->middleware('admin')->name('admin.logout');

Route::get('/admin', 
    [App\Http\Controllers\Admin\MainController::class, 'landingPage'])->middleware('admin')->name('admin');

Route::get('/admin/products', 
    [App\Http\Controllers\Admin\MainController::class, 'products'])->middleware('admin')->name('admin.products');

Route::post('/admin/products', 
    [App\Http\Controllers\Admin\MainController::class, 'addProduct'])->middleware('admin');

Route::put('/admin/products', 
    [App\Http\Controllers\Admin\MainController::class, 'editProduct'])->middleware('admin')->name('admin.products');

Route::delete('/admin/products', 
    [App\Http\Controllers\Admin\MainController::class, 'destroyProduct'])->middleware('admin');
