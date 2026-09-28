@extends('layouts.app')

@section('title', $product['name'])

@section('content')
    <h1>{{ $heading }}</h1>
    <p>Prepared by: Rostom P. Vigil</p>

    <table class="table table-bordered w-auto">
        <tr><th>ID</th><td>{{ $product['id'] }}</td></tr>
        <tr><th>Name</th><td>{{ $product['name'] }}</td></tr>
        <tr><th>Price</th><td>{{ $product['price'] }}</td></tr>
        <tr><th>Stock</th><td>{{ $product['stock'] }}</td></tr>
        <tr><th>Category</th><td>{{ $product['category'] }}</td></tr>
    </table>

    <p><a href="{{ route('products.index') }}">Back to the product list</a></p>
@endsection