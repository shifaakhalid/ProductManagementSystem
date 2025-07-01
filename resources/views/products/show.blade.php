@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $product->name ?? 'No Name' }}</h2>
    <p>SKU: {{ $product->sku ?? 'N/A' }}</p>
    <p>Price: ${{ $product->price ?? '0.00' }}</p>
    <p>Stock: {{ $product->stock ?? '0' }}</p>
    <p>Category: {{ $product->category->name ?? 'N/A' }}</p>
    <p>Supplier: {{ $product->supplier->name ?? 'N/A' }}</p>

    @if(!empty($product->image))
        <img src="{{ asset('storage/' . $product->image) }}" width="200">
    @else
        <p>No image available.</p>
    @endif
</div>
@endsection
