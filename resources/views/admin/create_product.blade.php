@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
        <h1 style="text-align: center;">Add Product</h1>
        <form action="{{ route('admin.saveProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 15px;">
                @isset($users->id)
                    <input type="hidden" name="user_id" value="{{ $users->id }}">
                    <label for="user_id" style="display: block; margin-bottom: 5px;">User: {{ $users->name }}</label>
                @else
                    <label for="user_id" style="display: block; margin-bottom: 5px;">Select User:</label>
                    <select name="user_id" id="user_id" style="width: 100%; padding: 8px; box-sizing: border-box;">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                @endisset
            </div>
            <div style="margin-bottom: 15px;">
                <label for="title" style="display: block; margin-bottom: 5px;">Title:</label>
                <input type="text" name="title" id="title" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="body" style="display: block; margin-bottom: 5px;">Body:</label>
                <textarea name="body" id="body" style="width: 100%; padding: 8px; box-sizing: border-box;" required></textarea>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="image" style="display: block; margin-bottom: 5px;">Image:</label>
                <input type="file" name="image" id="image" style="width: 100%; padding: 8px; box-sizing: border-box;">
            </div>
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" style="flex: 1; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; margin-right: 10px;">Save</button>
                <a href="{{ route('admin.userList') }}" style="flex: 1; padding: 10px; background-color: #6c757d; color: white; border: none; border-radius: 5px; text-align: center; text-decoration: none;">Back</a>
            </div>
        </form>
    </div>
@endsection