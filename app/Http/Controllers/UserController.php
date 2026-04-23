<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\ProductCart;
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
}
