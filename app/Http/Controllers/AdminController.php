<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function userList()
    {
        $users = User::with('products')->get();
        return view('admin.user_list', compact('users'));
    }

    public function productList()
    {
        $products = Product::all();
        return view('admin.product_list', compact('products'));
    }

    public function addProduct(Request $request)
    {
        // Add product logic
    }

    public function editProduct(Request $request, $id)
    {
        // Edit product logic
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product->user_id) {
            return redirect()->back()->withErrors(['error' => 'Product is tagged to a user and cannot be deleted.']);
        }
        $product->delete();
        return redirect()->route('admin.productList');
    }
}
