<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class MainController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function landingPage()
    {
        return view('admin.index');
    }

    public function products() {

        $products = Product::orderBy('updated_at', 'desc')->get();
        $add = request('add');
        if ($add != 1) {
            $add = 0;
        }

        return view ('admin.products', [ 'add' => $add, 'products' => $products ]);
    }

    public function addProduct(Request $request) {
        $product = new Product;
        $product->name = $request->name;
        $product->color = $request->color;
        $product->image = $request->image;
        $product->type = $request->type;
        $product->size = $request->size;
        $product->price = $request->price;

        $product->save();
        return redirect()->route('admin.products');
    }
}
