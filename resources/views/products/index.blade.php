@extends('layouts.app')
@section('content')
    <h1>My Products</h1>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->title }}
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('products.create') }}">Add Product</a>
@endsection