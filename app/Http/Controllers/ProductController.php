<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::orderBy('updated_at', 'desc')->get();
        foreach ($products as $product) {
            // echo $product;
        }
        return view('products.index');
    }
}
