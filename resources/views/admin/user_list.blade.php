@extends('layouts.app')

@section('content')
    <h1>User List</h1>
    <div style="margin-bottom: 20px;">
        <a href="{{ route('admin.addProduct') }}" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; text-decoration: none;">Add New Product</a>
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
                <tr>
                    <td style="border: 1px solid #ccc; padding: 8px; width: 20%;">{{ $user->name }}</td>
                    <td style="border: 1px solid #ccc; padding: 8px;">
                        <ul style="list-style-type: none; padding: 0; margin: 0;">
                            @foreach($user->products as $product)
                                <li>{{ $product->title }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td style="border: 1px solid #ccc; padding: 8px; width: 20%; text-align: center;">
                        <a href="{{ route('admin.editProduct', $user->id) }}" style="margin-right: 10px;">Edit</a>
                        <form action="{{ route('admin.deleteProduct', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: red; cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection