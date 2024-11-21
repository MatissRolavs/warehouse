<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilizedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category',
        'price',
        'quantity',
    ];

    /**
     * Define the relationship with the Product model.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);  // Each utilized product belongs to one product
    }
}

