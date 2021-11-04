<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $admins = User::where('role', 'ADMIN')->orderBy('updated_at', 'desc')->get();
        $customers = User::where('role', 'CUSTOMER')->orderBy('updated_at', 'desc')->get();

        return view('admin.customer.index', [
            'customers' => $customers,
            'admins' => $admins,
        ]);
    }

    public function show($id) {
        $customer = User::find($id);
        if (!$customer) {
            return redirect()->back()->with('error', 'Invalid user selected');
        }

        if ($customer->role == 'ADMIN') {
            return redirect()->back()->with('error', 'Invalid user selected');
        }

        $orders = $customers->order;

        return view("admin.customer.show", [
            'customer' => $customer,
            'orders' => $orders
        ]);
    }

}
