@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
        <h1 style="text-align: center;">Edit User</h1>
        <form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            
            <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px;">Update</button>
        </form>
    </div>
@endsection