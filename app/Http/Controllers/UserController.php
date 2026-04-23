<?php

namespace App\Http\Controllers;

use App\Models\product;
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
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function productdetail($id)
    {
        $product = Product::findOrFail($id);
        return view('product_detail', compact('product'));
    }
}
