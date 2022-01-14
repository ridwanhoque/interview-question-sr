<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use Carbon\Carbon;

class Product extends Model
{
    protected $fillable = [
        'title', 'sku', 'description'
    ];

    //Accessors
    public function getCreatedAgoAttribute(){
        return Carbon::parse($this->created_at)->diffForHumans();
    }



    //relations
    public function product_images(){
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function product_variants(){
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

    public function product_variant_prices(){
        return $this->hasMany(ProductVariantPrice::class, 'product_id', 'id');
    }



}
