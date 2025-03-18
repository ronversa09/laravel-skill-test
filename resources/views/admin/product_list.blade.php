@extends('layouts.app')

@section('content')
    <h1>Product List</h1>
    <ul>
        @foreach($products as $product)
            <li>{{ $product->title }}
                @if(!$product->user_id)
                    <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @else
                    <span>Cannot delete</span>
                @endif
            </li>
        @endforeach
    </ul>
@endsection