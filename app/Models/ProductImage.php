<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class ProductImage extends Model
{
    public function Product(){
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }
}
