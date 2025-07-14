<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeproductRequest;
use App\Http\Requests\updateproductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product\Product as ProductProduct;
use App\Models\Supplier;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;

class productController extends Controller
{
    
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('products.index', compact('products'));
    }

    
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('products.create', compact('categories', 'suppliers'));
       

    }



    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['sku'] = $this->generateSKU($data['name']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products_image', 'public');
        }

        Product::create($data);

        return redirect()->route('index')->with('success', 'Product created successfully.');
    }

    private function generateSKU($productName)
    {
        $slug = strtoupper(substr($productName, 0, 3));
        $unique = strtoupper(uniqid());
        return $slug . '-' . $unique;
    }



    public function show(Product $product)
    {

        return view('products.show', compact('product'));
    }

    public function edit(Product $product) 
    {
        $categories = Category::all();
         $suppliers = Supplier::all();

      return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

  
    public function update(updateproductRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products_images', 'public');
        }
        $product->update($data);
        return redirect()->route('index')->with('success', 'products updated');


        
    }


  
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'product deleted!');
    }
}
