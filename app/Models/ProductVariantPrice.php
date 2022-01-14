<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductVariantPrice extends Model
{
    public function product(){
        return $this->belongsTo(Product::class, 'id', 'product_id');
    }

    public function product_variant_first(){
        return $this->belongsTo(ProductVariant::class, 'product_variant_one', 'id');
    }

    public function product_variant_second(){
        return $this->belongsTo(ProductVariant::class, 'product_variant_two', 'id');
    }
    
    public function product_variant_third(){
        return $this->belongsTo(ProductVariant::class, 'product_variant_three', 'id');
    }
}
