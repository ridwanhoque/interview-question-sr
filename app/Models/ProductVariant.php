<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Variant;
use App\Models\ProductVariantPrice;

class ProductVariant extends Model
{
    public function variant(){
        return $this->belongsTo(Variant::class, 'variant_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function product_variant_price_one(){
        return $this->hasMany(ProductVariantPrice::class, 'product_variant_one', 'id');
    }

    public function product_variant_price_two(){
        return $this->hasMany(ProductVariantPrice::class, 'product_variant_two', 'id');
    }
    
    public function product_variant_price_three(){
        return $this->hasMany(ProductVariantPrice::class, 'product_variant_three', 'id');
    }
}
