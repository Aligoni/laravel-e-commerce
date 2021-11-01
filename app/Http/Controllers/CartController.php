<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    
    public function index() {
        $price = 0;
        $found = false;
        $cart_items = Cart::where('user_id', Auth()->user()->id)->get();

        foreach ($cart_items as $item) {
            $price+= $item->price * $item->quantity;
        }

        return view('cart.index', [ 
            'items' => $cart_items, 
            'found' => $found, 
            'total_price' => $price 
        ]);
    }

    public function show($id) {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products');
        }

        $quantity = 0;
        $found = false;
        if (Auth::check()) {
            $cart_items = Cart::where('user_id', Auth()->user()->id)->get();
            foreach ($cart_items as $item) {
                if ($item->product_id == $id) {
                    $found = true;
                    $quantity = $item->quantity;
                }
            }
        }

        return view('products.show', [ 
            'product' => $product, 
            'found' => $found, 
            'quantity' => $quantity 
        ]);
    }

    public function addTocart($id) {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products');
        }

        $cart_items = Cart::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        $found = false;

        foreach ($cart_items as $item) {
            if ($item->product_id == $id) {
                $found = true;
                $item->quantity++;
                $item->save();
            }
        }

        if (!$found) {
            $cart_item = new Cart;
            $cart_item->user_id = Auth()->user()->id;
            $cart_item->product_id = $id;
            $cart_item->quantity = 1;
            $cart_item->save();
        }

        return redirect('products/'.$id);
    } 
}
