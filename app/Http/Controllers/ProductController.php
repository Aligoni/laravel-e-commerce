<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Auth;

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

        return redirect()->back();
    } 
    
    public function removeFromCart($id) {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products');
        }

        $cart_items = Cart::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        $found = false;

        foreach ($cart_items as $item) {
            if ($item->product_id == $id) {
                $found = true;
                if ($item->quantity == 1) {
                    $item->delete();
                } else {
                    $item->quantity--;
                    $item->save();
                }
            }
        }

        if (!$found) {
            return redirect()->back();
        }

        return redirect()->back();
    } 
}
