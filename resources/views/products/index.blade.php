
@extends('layouts.app2')

@section('content')
<div class="container">
    <h2 style="font-size:larger; font-weight: 800;">All Products</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif



    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>SKU</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Supplier</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->category->name ?? 'N/A' }}</td>
                <td>{{ $product->supplier->name ?? 'N/A' }}</td>
                <td>
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="60">
                    @else
                    N/A
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">No products found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $products->links() }} <!-- pagination -->
</div>
@endsection