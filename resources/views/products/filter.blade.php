@extends('layouts.app')

@section('title', 'Filter Products')

@section('content')
    <h1>My Product List</h1>
    <p>Prepared by: Rostom P. Vigil</p>

    @if ($category === null)
        <p>Showing all products (no filter is active).</p>
    @else
        <p>Filter active: category is <strong>{{ $category }}</strong></p>
    @endif

    @if (count($products) === 0)
        <p>No products match that category.</p>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><a href="{{ route('products.show', $product['id']) }}">{{ $product['name'] }}</a></td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['stock'] }}</td>
                        <td>{{ $product['category'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <p>
        <a href="{{ route('products.filter') }}">Show all products</a> |
        <a href="{{ route('products.index') }}">Back to the product list</a>
    </p>
@endsection