<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Product Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
    </div>

    <div class="mb-3">
        <label>SKU</label>
        <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
    </div>

    <div class="mb-3">
        <label>Category:</label>
        <select name="category_id" class="form-select">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Save Product</button>
</form>
