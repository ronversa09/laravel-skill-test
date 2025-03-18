@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
        <h1 style="text-align: center;">Admin Login</h1>
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px;">Email:</label>
                <input type="email" name="email" id="email" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            
            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; margin-bottom: 5px;">Password:</label>
                <input type="password" name="password" id="password" style="width: 100%; padding: 8px; box-sizing: border-box;" required>
            </div>
            
            <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; margin-bottom: 10px;">Login</button>
        </form>
        <div style="text-align: center;">
            <a href="{{ route('admin.showRegisterForm') }}" style="display: inline-block; width: 97%; padding: 10px; background-color: #28a745; color: white; border: none; border-radius: 5px; text-decoration: none;">Become an Admin</a>
        </div>
    </div>
@endsection