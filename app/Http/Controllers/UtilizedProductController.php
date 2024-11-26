<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UtilizedProduct;
use Illuminate\Http\Request;

class UtilizedProductController extends Controller
{
    // Store a new utilized product
    public function store($productId)
    {
        $product = Product::findOrFail($productId);
    
        // Mark the product as utilized
        $utilizedProduct = new UtilizedProduct();
        $utilizedProduct->name = $product->name;
        $utilizedProduct->product_id = $product->id;
        $utilizedProduct->category = $product->category; // Store the category
        $utilizedProduct->price = $product->price; // Store the price
        $utilizedProduct->quantity = $product->quantity; // Store the quantity
        $utilizedProduct->save();
    
        // Redirect to the utilized products index page
        return redirect()->route('utilized.index');
    }
    
    // Index of utilized products with optional category filter
    public function index(Request $request)
    {
        // Get the category filter from the request
        $category = $request->get('category');
        
        // Fetch utilized products, optionally filtered by category
        if ($category) {
            $utilizedProducts = UtilizedProduct::where('category', $category)->get();
        } else {
            $utilizedProducts = UtilizedProduct::all();
        }
        
        // Get all unique categories for the dropdown filter
        $categories = UtilizedProduct::select('category')->distinct()->pluck('category');
        
        return view('products.utilized', compact('utilizedProducts', 'categories', 'category'));
    }
}
