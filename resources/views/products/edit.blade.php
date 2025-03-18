@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title">
        <label for="body">Body:</label>
        <textarea name="body" id="body"></textarea>
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <button type="submit">Add</button>
    </form>
@endsection