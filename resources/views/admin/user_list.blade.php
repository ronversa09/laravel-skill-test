@extends('layouts.app')

@section('content')
    <div style="position: relative;">
        <form action="{{ route('admin.logout') }}" method="POST" style="position: absolute; top: 0; right: 0;">
            @csrf
            <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">Logout</button>
        </form>
    </div>
    <h1>User List</h1>
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.addProduct', 0) }}" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; text-decoration: none;">Add New Product</a>
    </div>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr>
                <th style="border: 1px solid #ccc; padding: 8px; width: 20%;">User Name</th>
                <th style="border: 1px solid #ccc; padding: 8px;">Products</th>
                <th style="border: 1px solid #ccc; padding: 8px; width: 20%; text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if ($user->products->count() > 0)
                    @foreach($user->products as $product)
                        <tr>
                            <td style="border: 1px solid #ccc; padding: 8px; width: 20%;">
                                {{ $user->name }}
                            </td>
                            <td style="border: 1px solid #ccc; padding: 8px;">
                                {{ $product->title }}
                            </td>
                            <td style="border: 1px solid #ccc; padding: 8px; width: 20%; text-align: center;">
                                <a href="{{ route('admin.editProduct', $product->id) }}" style="margin-right: 10px;">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td style="border: 1px solid #ccc; padding: 8px; width: 20%;">{{ $user->name }}</td>
                        <td style="border: 1px solid #ccc; padding: 8px;"></td>
                        <td style="border: 1px solid #ccc; padding: 8px; width: 20%; text-align: center;">
                            <a href="{{ route('admin.addProduct', $user->id) }}" style="margin-left: 50px;">Add</a>
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection