<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\UtilizedProduct;


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
    
        // Add a flag to indicate whether the product is utilized
        $utilizedproducts = UtilizedProduct::count();
        if($utilizedproducts > 0){
            foreach ($products as $product) {
            $product->is_utilized = UtilizedProduct::where('product_id', $product->id)->exists();
        }
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
            'price' => 'required|numeric|min:0',
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
        $utilizedProductIds = UtilizedProduct::pluck('product_id')->toArray();
        $products = Product::all();
        $lowstock = Product::where('quantity', '<=', 10)->whereNotIn('id', $utilizedProductIds)->get();
        $utilizedProduct = UtilizedProduct::all();
        return view('inventory', compact('products', 'lowstock', 'utilizedProduct'));
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
        $utilizedProductIds = UtilizedProduct::pluck('product_id')->toArray();

        if ($category = request('category')) {
            $lowstock = Product::where('category', $category)
                ->where('quantity', '<=', 10)
                ->whereNotIn('id', $utilizedProductIds)
                ->get();
        } else {
            $lowstock = Product::where('quantity', '<=', 10)
                ->whereNotIn('id', $utilizedProductIds)
                ->get();
        }

        $categoryLowstock = Product::where('quantity', '<=', 10)
            ->whereNotIn('id', $utilizedProductIds)
            ->get();
        return view('products.lowstock', compact('lowstock','categoryLowstock'));
    }
}