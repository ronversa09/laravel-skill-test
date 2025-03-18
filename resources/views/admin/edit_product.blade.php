@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
        <h1 style="text-align: center;">Edit Product</h1>
        <form action="{{ route('admin.updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="user_id" style="display: block; margin-bottom: 5px;">Select User:</label>
                <select name="user_id" id="user_id" style="width: 100%; padding: 8px; box-sizing: border-box;">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $product->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="title" style="display: block; margin-bottom: 5px;">Title:</label>
                <input type="text" name="title" id="title" value="{{ $product->title }}" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="body" style="display: block; margin-bottom: 5px;">Body:</label>
                <textarea name="body" id="body" style="width: 100%; padding: 8px; box-sizing: border-box;" required>{{ $product->body }}</textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="quantity" style="display: block; margin-bottom: 5px;">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="image" style="display: block; margin-bottom: 5px;">Image:</label>
                <input type="file" name="image" id="image" style="width: 100%; padding: 8px; box-sizing: border-box;">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="margin-top: 10px; max-width: 100%;">
                @endif
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" style="flex: 1; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; margin-right: 10px;">Update</button>
                <a href="{{ route('admin.userList') }}" style="flex: 1; padding: 10px; background-color: #6c757d; color: white; border: none; border-radius: 5px; text-align: center; text-decoration: none;">Back</a>
            </div>
        </form>
    </div>
@endsection