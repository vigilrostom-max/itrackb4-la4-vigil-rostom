@extends('layouts.app')

@section('title', 'Product List')

@section('content')
    <h2>Product List</h2>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>
                        {{ $product['price'] }}
                        @if ($product['price'] >= 40)
                            <span class="badge bg-danger">Expensive</span>
                        @else
                            <span class="badge bg-success">Affordable</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('products.show', $product['id']) }}">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Sorry, the shelves are empty today. Please come back later.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection