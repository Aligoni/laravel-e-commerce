<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Chat;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Events\MessageSent;
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

    public function getUserCart ($id) {
        $cart_items = Cart::where('user_id', $id)->orderBy('updated_at', 'desc')->get();
        return response()->json($cart_items);
    }

    public function getUserChat ($id) {
        $messages = Chat::where('user_id', $id)->orderBy('updated_at', 'desc')->get();
        return response()->json($messages);
    }

    public function sendMessage(Request $request) {
        $message = new Chat;
        $message->user_id = $request->user_id;
        $message->sender = $request->sender;
        $message->message = $request->message;
        $message->seen = 0;

        $message->save();
        broadcast(new MessageSent($message));
        
        return response()->json($message);
    }
}