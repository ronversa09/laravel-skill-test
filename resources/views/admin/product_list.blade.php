@extends('layouts.app')

@section('content')
    <h1>Product List</h1>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #ccc; padding: 8px;">Product Title</th>
                <th style="border: 1px solid #ccc; padding: 8px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px;">{{ $product->title }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">
                        @if(!$product->user_id)
                            <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">Delete</button>
                            </form>
                        @else
                            <span>Cannot delete</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection