@extends('layouts.app2')

@if($errors->any())
<div class="alert alert-danger px-4">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@section('content')
<div class="w-full max-w-md mx-auto  h-8 text-sm  bg-white">
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"
          class="w-full max-w-lg bg-white p-4 rounded-md shadow border border-gray-200">
        @csrf

        <h2 class="text-lg font-bold text-center mb-3">Add Product</h2>

        <div class="mb-2">
            <label class="block text-sm font-medium">Name:</label>
            <input type="text" name="name" class="form-control w-full h-8 text-sm" value="{{ old('name') }}">
        </div>

        <div class="mb-2">
            <label class="block text-sm font-medium">Price:</label>
            <input type="number" step="0.01" name="price" class="form-control w-full h-8 text-sm" value="{{ old('price') }}">
        </div>

        <div class="mb-2">
            <label class="block text-sm font-medium">Stock:</label>
            <input type="number" name="stock" class="form-control w-full h-8 text-sm" value="{{ old('stock') }}">
        </div>

        <div class="mb-2">
            <label class="block text-sm font-medium">Supplier ID:</label>
            <input type="number" name="supplier_id" class="form-control w-full h-8 text-sm" value="{{ old('supplier_id') }}">
        </div>

        <div class="mb-2">
            <label class="block text-sm font-medium">Category:</label>
            <select name="category_id" class="form-select w-full h-8 text-sm">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected':'' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium">Image:</label>
            <input type="file" name="image" class="form-control w-full h-8 text-sm">
        </div>

        <button
            class="w-full px-4 py-1.5 bg-blue-500 text-white text-sm font-semibold rounded hover:bg-blue-600 transition">
            Save
        </button>
    </form>
</div>
@endsection
