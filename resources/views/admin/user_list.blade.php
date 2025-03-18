@extends('layouts.app')

@section('content')
    <h1>User List</h1>
    <ul>
        @foreach($users as $user)
            <li>{{ $user->name }}
                <ul>
                    @foreach($user->products as $product)
                        <li>{{ $product->title }}</li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endsection