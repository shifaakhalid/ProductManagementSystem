

@extends('layouts.app2')
<style>
    body{
        overflow: scroll;
    }
</style>

@section('content')

<div style="overflow:visible"class="w-full max-w-md mx-auto mt-6">
    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded shadow">
            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"
        class="bg-white p-6 rounded-lg shadow border border-gray-200 space-y-4">
        @csrf

        <h2 class="text-lg font-bold text-center text-blue-600">Add Product</h2>

    
        <div>
            <label class="block text-sm font-medium text-gray-700">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring focus:border-blue-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Price:</label>
            <input type="number" name="price" step="any" value="{{ old('price') }}"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring focus:border-blue-400">
        </div>

    
        <div>
            <label class="block text-sm font-medium text-gray-700">Stock:</label>
            <input type="number" name="stock" value="{{ old('stock') }}"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring focus:border-blue-400">
        </div>


        <div>
            <label class="block text-sm font-medium text-gray-700">Supplier:</label>
            <select name="supplier_id"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring focus:border-blue-400">
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

      
        <div>
            <label class="block text-sm font-medium text-gray-700">Category:</label>
            <select name="category_id"
                class="w-full border border-gray-300 rounded px-3 py-1.5 text-sm focus:outline-none focus:ring focus:border-blue-400">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

 
        <div>
            <label class="block text-sm font-medium text-gray-700">Image:</label>
            <input type="file" name="image"
                class="w-full text-sm border border-gray-300 rounded px-3 py-1.5 file:bg-gray-100 file:border-0 file:py-1 file:px-2 file:rounded file:text-gray-700">
        </div>

     
        <div>
            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 rounded transition">
                Save Product
            </button>
        </div>
    </form>
</div>
@endsection
