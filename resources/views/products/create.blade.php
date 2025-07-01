@extends('layouts.app2')


@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@section('content')
<div class="form w-100% h-100vh flex flex-col items-center justify-center h-screen ">
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="flex flex-col items-center justify-center h-screen ">
        @csrf

        <div class="mb-2 "> 
            <h2 class="text-[30px] font-bold text-center pb-2">Add New Product</h2>

            <label>Name:</label>
            <input type="text" name="name" class="form-control px-20" value="{{ old('name') }}">
        </div>

        <div class="mb-2">
            <label>Price:</label>
            <input type="number" step="0.01" name="price" class="form-control px-20  " value="{{ old('price') }}">
        </div>

        <div class="mb-2">
            <label>Stock:</label>
            <input type="number" name="stock" class="form-control px-20" value="{{ old('stock') }}">
        </div>

        <div class="mb-2">
            <label>supplier id:</label>
            <input type="number" name="supplier_id" class="form-control px-20" value="{{ old('supplier_id') }}">
        </div>

        <div class="mb-2">
            <label>Category:</label>
            <select name="category_id" class="form-select px-20">
                @foreach($categories as $category)
                <!-- <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected':'' }}> -->
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Image:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary px-10 py-2 bg-blue-400 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">Save</button>
    </form>
</div>
@endsection