<?php

namespace App\Models;
use App\Models\UtilizedProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category',
        'quantity',
        'price',
    ];
}
