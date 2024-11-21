<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUtilizedProductRequest;
use App\Http\Requests\UpdateUtilizedProductRequest;
use App\Models\Product;
use App\Models\UtilizedProduct;

class UtilizedProductController extends Controller
{

    public function index()
    {
        $utilizedProducts = UtilizedProduct::with('product')->get(); // Adjust if needed
        return view('products.utilized', compact('utilizedProducts'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUtilizedProductRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $product->delete();

        $utilizedProduct = new UtilizedProduct();
        $utilizedProduct->product_id = $request->product_id;
        $utilizedProduct->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UtilizedProduct $utilizedProduct)
    {
        $product = new Product();
        $product->id = $utilizedProduct->product_id;
        $product->save();

        $utilizedProduct->delete();
    }
}

