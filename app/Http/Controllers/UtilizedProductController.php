<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\UtilizedProduct;
use Illuminate\Http\Request;

class UtilizedProductController extends Controller
{
    // UtilizedProductController.php
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
    
        // Delete the product from the products table
    
        return redirect()->route('utilized.index');
    }
    
    


    public function index()
    {
        $utilizedProducts = UtilizedProduct::with('product')->get(); // Get all utilized products
    
        return view('products.utilized', compact('utilizedProducts'));
    }
    
}

