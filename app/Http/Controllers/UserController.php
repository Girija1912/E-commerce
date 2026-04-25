<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\ProductCart;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->user_type == "user") {
            return view('dashboard');
        } else {
            return view('admin.dashboard');
        }
    }

    public function home()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }

        $products = Product::latest()->take(2)->get();
        return view('index', compact('products', 'count'));
    }

    public function productdetail($id)
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $product = Product::findOrFail($id);
        return view('product_detail', compact('product', 'count'));
    }

    public function viewallproducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
        } else {
            $count = '';
        }
        $products = Product::all();
        return view('viewallproducts', compact('products', 'count'));
    }

    public function addtocart($id)
    {
        $product = Product::findOrFail($id);
        $product_cart = new ProductCart();
        $product_cart->user_id = Auth::id();
        $product_cart->product_id = $product->id;

        $product_cart->save();

        return redirect()->back()->with('cart_message', 'added to the cart');
    }

    public function cartproducts()
    {
        if (Auth::check()) {
            $count = ProductCart::where('user_id', Auth::id())->count();
            $cart = ProductCart::where('user_id', Auth::id())->get();
        } else {
            $count = '';
        }
        return view('viewcartproducts', compact('cart', 'count'));
    }

    public function removecartproduct($id)
    {
        $product_cart = ProductCart::findOrFail($id);
        $product_cart->delete();
        return redirect()->back();
    }

    public function confirmOrder(Request $request)
    {
        $cart_product_id = ProductCart::where('user_id', Auth::id())->get();
        $address = $request->receiver_address;
        $phone = $request->receiver_phone;
        foreach ($cart_product_id as $cart_product) {
            $order = new Order();
            $order->receiver_address = $address;
            $order->receiver_phone = $phone;
            $order->user_id = Auth::id();
            $order->product_id = $cart_product->product_id;
            $order->save();
        }
        $cart = ProductCart::where('user_id', Auth::id())->get();
        foreach ($cart as $cart) {
            $cart_id = ProductCart::findOrFail($cart->id);
            $cart_id->delete();
        }
        return redirect()->back()->with('confirmOrder_message', 'successfully order item');
    }

    public function myorders()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('viewmyorders', compact('orders'));
    }
}
