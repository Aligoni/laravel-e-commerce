<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Auth;

class ApiController extends Controller
{
    //
    public function getAllProducts() {
        $products = Product::orderBy('updated_at', 'desc')->get();
        return response()->json($products);
    }

    public function searchProducts($text) {
        $products = Product::whereRaw("MATCH(size, type, color, name) AGAINST(?)", array($text))->get();
        return response()->json($products);
    }
}