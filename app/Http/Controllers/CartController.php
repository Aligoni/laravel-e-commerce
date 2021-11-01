<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use Auth;

class CartController extends Controller
{
    
    public function index() {
        $price = 0;
        $found = false;
        $cart_items = Cart::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        foreach ($cart_items as $item) {
            $price += $item->product->price * $item->quantity;
        }

        return view('cart.index', [ 
            'items' => $cart_items, 
            'found' => $found, 
            'total_price' => $price 
        ]);
    }
    
    public function checkout() {
        $price = 0;
        $cart_items = Cart::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        foreach ($cart_items as $item) {
            $price += $item->product->price * $item->quantity;
        }

        if ($price == 0) {
            return redirect()->route('products')->with('warning', 'Error checking out. Your cart is empty');
        }

        return view('cart.checkout', [ 
            'items' => $cart_items, 
            'total_price' => $price 
        ]);
    }

    public function placeOrder(Request $request) {
        $price = 0;
        $cart_items = Cart::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'desc')->get();

        foreach ($cart_items as $item) {
            $price += $item->product->price * $item->quantity;
        }
        
        $order = new Order;
        $order->user_id = Auth()->user()->id;
        $order->address = $request->address;
        $order->total_price = $price;
        $order->save();

        $order = Order::where('user_id', Auth()->user()->id)->orderBy('updated_at', 'desc')->first();

        foreach ($cart_items as $item) {
            $orderProduct = new OrderProduct;
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $item->product_id;
            $orderProduct->name = $item->product->name;
            $orderProduct->color = $item->product->color;
            $orderProduct->size = $item->product->size;
            $orderProduct->type = $item->product->type;
            $orderProduct->price = $item->product->price;
            $orderProduct->image = $item->product->image;
            $orderProduct->quantity = $item->quantity;
            $orderProduct->save();

            $item->delete();
        }

        return redirect()->route('/')->with('message', 'Order Placed Successfully');
    }
}
