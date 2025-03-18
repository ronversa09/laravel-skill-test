@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
        <h1 style="text-align: center;">Admin Registration</h1>
        <form action="{{ route('admin.register') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px;">Name:</label>
                <input type="text" name="name" id="name" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
                <input type="email" name="email" id="email" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; margin-bottom: 5px;">Password:</label>
                <input type="password" name="password" id="password" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 5px;">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="is_admin" style="display: block; margin-bottom: 5px;">Is Admin:</label>
                <input type="checkbox" name="is_admin" id="is_admin">
            </div>
            
            <div style="display: flex; justify-content: space-between;">
                <button type="submit" style="flex: 1; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; margin-right: 10px;">Register</button>
                <a href="{{ route('admin.showLoginForm') }}" style="flex: 1; padding: 10px; background-color: #6c757d; color: white; border: none; border-radius: 5px; text-align: center; text-decoration: none;">Back</a>
            </div>
        </form>
    </div>
@endsection