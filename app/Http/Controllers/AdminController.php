<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addcategory()
    {
        return view('admin.addcategory');
    }

    public function postaddcategory(Request $request)
    {
        $category = new Category();
        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with('category_message', 'category add successfully');
    }

    public function viewcategory()
    {
        $categories = Category::all();
        return view('admin.viewcategory', compact('categories'));
    }

    public function deletecategory($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('deletecategory_message', 'Deleted successfully');
    }

    public function updatecategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.updatecategory', compact('category'));
    }

    public function postupdatecategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully');
    }


    // Product category

    public function addproduct()
    {
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }

    public function postaddproduct(Request $request)
    {
        $product = new Product();
        $product->product_title = $request->product_title;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;

        $image = $request->product_image;
        if ($image) {
            $imagename = time() . "." . $image->getClientOriginalExtension();

            $product->product_image = $imagename;
        }

        $product->product_category = $request->product_category;

        $product->save();

        if ($image && $product->save()) {
            $request->product_image->move("products", $image);
        }
        return redirect()->back()->with('product_message', 'Product added successfully');
    }

    public function viewproduct()
    {
        $products = Product::all();
        return view('admin.viewproduct', compact('products'));
    }

    public function deleteproduct($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->back()->with('deleteproduct_message', "Deleted successfully");
    }

    public function updateproduct($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.updateproduct', compact('products', 'categories'));
    }

    public function postupdateproduct(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();

        $products->product_title = $request->product_title;
        $products->product_description = $request->product_description;
        $products->product_quantity = $request->product_quantity;
        $products->product_price = $request->product_price;
        $products->product_category = $request->product_category;
        $image = $request->product_image;
        if ($image) {
            $imagename = time() . "." . $image->getClientOriginalExtension();

            $products->product_image = $imagename;
        }


        $products->save();

        return redirect()->back()->with('updateproduct_message', "Product updated successfully");
    }
}
