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
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

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

Route::get('/products', 
    [App\Http\Controllers\ProductController::class, 'index'])->name('products');