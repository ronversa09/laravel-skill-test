<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ProductCreated;

class AdminController extends Controller
{

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

    public function userList()
    {
        $users = User::with('products')->get();
        return view('admin.user_list', compact('users'));
    }

    public function addProduct(Request $request, $id)
    {
        $users = ($id)? User::findOrFail($id) : User::with('products')->get();
        return view('admin.create_product', compact('users'));
    }

    public function editProduct(Request $request, $id)
    {
        
        $product = Product::find($id);
        $users = User::with('products')->get();
        return view('admin.edit_product', compact('product', 'users'));
        
    }

    public function updateProduct(Request $request, $id)
    {
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'body' => 'required|string',
        //     'user_id' => 'required|exists:users,id',
        //     'image' => 'nullable|image',
        // ]);

        $product = Product::findOrFail($id);
        $product->title = $request->input('title');
        $product->body = $request->input('body');
        $product->user_id = $request->input('user_id');

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('admin.userList')->with('success', 'Product updated successfully.');
    }

    public function saveProduct(Request $request)
    {

        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'body' => 'required|string',
        //     'user_id' => 'required|exists:users,id',
        //     'image' => 'nullable|image',
        // ]);

        $product = new Product($request->all());
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'ftp');
        }
        $product->user_id = $request->input('user_id');
        $product->save();

        event(new ProductCreated($product));

        return redirect()->route('admin.userList');
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
