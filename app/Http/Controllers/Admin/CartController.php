<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Frontend\Cart;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::orderBy('id', 'DESC')->get();
        return view('admin.cart.index', compact('carts'));
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('carts.index')->with('success_msg', 'Cart Deleted Successfully');
    }
}
