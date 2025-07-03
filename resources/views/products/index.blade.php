<body style="overflow:scroll; overflow-X:hidden;">

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
                   <td>
        <a href="{{ route('products.show', $product->id) }}" class="no-underline text-black font-bold ">
            {{ $product->name }}
        </a>
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
                    <td style="border:none">
                        <a href="{{ route('products.show', $product->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-pencil-square " viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg></a>
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
</body>