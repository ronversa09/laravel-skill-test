@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; margin-bottom: 20px;">My Products</h1>
    <div style="max-width: 800px; margin: 0 auto;">
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr>
                    <th style="border: 1px solid #ccc; padding: 8px;">Product Title</th>
                    <th style="border: 1px solid #ccc; padding: 8px; width: 20%; text-align: center;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px;">{{ $product->title }}</td>
                        <td style="border: 1px solid #ccc; padding: 8px; width: 20%; text-align: center;">
                            <a href="{{ route('products.edit', $product->id) }}" style="margin-right: 10px; text-decoration: none; color: #007bff;">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('products.create') }}" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; text-decoration: none;">Add Product</a>
        </div>
    </div>
@endsection