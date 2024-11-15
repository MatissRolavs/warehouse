<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if ($category = request('category')) {
            $products = Product::where('category', $category)->get();
        } else {
            $products = Product::all();
        }
        $categoryProducts = Product::all();
        return view('products.index', compact('products', 'categoryProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $product = Product::create($validatedData);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
        ]);

        $product->update($validatedData);

        return redirect()->route('product.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
    public function inventory(){
        $products = Product::all();
        $lowstock = Product::where('quantity', '<=', 10)->get();
        
        return view('inventory', compact('products', 'lowstock'));
    }


    public function buy(Product $product)
    {
        return view('products.buy', compact('product'));
    }
    public function buyupdate(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $validatedData['quantity'] += $product->quantity;
        $product->update($validatedData);

        return redirect()->route('product.show', $product);
    }
    public function lowstockIndex(){
        if ($category = request('category')) {
            $lowstock = Product::where('quantity', '<=', 10)->get();
            $lowstock = Product::where('category', $category)->where('quantity', '<=', 10)->get();
        } else {
            $lowstock = Product::where('quantity', '<=', 10)->get();
        }
        $categoryLowstock = Product::where('quantity', '<=', 10)->get();
        return view('products.lowstock', compact('lowstock','categoryLowstock'));
    }
}