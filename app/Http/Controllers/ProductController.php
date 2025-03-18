<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\ProductCreated;
use App\Factories\ProductServiceFactory;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function __construct(Request $request)
    {
    }

    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('products.index', compact('products'));
    }

    public function add(Request $request): JsonResponse
    {
        $service = $request->input('service', 'fakestore');
        $productService = ProductServiceFactory::make($service);

        $response = $productService->addProduct([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'image' => $request->input('image'),
        ]);

        if ($response->successful()) {
            $product = Product::create($request->all());
            event(new ProductCreated($product));
            return response()->json($response->json(), $response->status());
        } else {
            return response()->json(['error' => 'Failed to add product'], 500);
        }
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:products,title',
            'body' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image',
        ]);

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
        $request->validate([
            'title' => 'required|string|max:255|unique:products,title,' . $id,
            'body' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|image',
        ]);

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
