<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::orderBy('updated_at', 'desc')->get();
        
        return view('products.index', [ 'products'=> $products ]);
    }

    public function show($id) {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products');
        }

        return view('products.show', [ 'product' => $product ]);
    }
}
