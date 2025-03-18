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

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.userList')->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.userList')->with('success', 'User deleted successfully.');
    }

    public function productList()
    {
        $products = Product::all();
        return view('admin.product_list', compact('products'));
    }

    public function addProduct(Request $request)
    {
        $users = User::with('products')->get();
        return view('product.create', compact('users'));
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
