<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ProductCreated;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product($request->all());
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'ftp');
        }
        $product->user_id = Auth::id();
        $product->save();

        event(new ProductCreated($product));

        return redirect()->route('products.index');
    }

    public function show()
    {
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'ftp');
        }
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
