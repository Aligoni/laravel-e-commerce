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

        $productId = request('id');
        $edit = 0;
        $product = null;
        if (isset($productId)) {
            $product = Product::find($productId);
            if ($product) {
                $edit = 1;
            } else {
                return redirect()->route('admin.products');
            }
        }

        return view ('admin.products', [ 
            'add' => $add, 
            'products' => $products, 
            'product' => $product,
            'edit' => $edit
        ]);
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

    public function editProduct (Request $request) {
        $product = Product::find($request->id);
        if (!$product) {
            return redirect()->route('admin.products');
        }

        $product->name = $request->name;
        $product->color = $request->color;
        $product->image = $request->image;
        $product->type = $request->type;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('admin.products');
    }

    public function destroyProduct(Request $request) {
        $product = Product::find($request->id);
        if (!$product) {
            return redirect()->route('admin.products');
        }

        $product->delete();

        return redirect()->route('admin.products');
    }
}
