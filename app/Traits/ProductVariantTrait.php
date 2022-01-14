<?php

namespace App\Traits;

use App\Models\ProductVariant;

trait ProductVariantTrait{

    
    public function productVariant1(){
        
        $product_variants1 = $this->getProductVariant('Color');
        return $product_variants1;
         
    }

    public function productVariant2(){
        
        $product_variants2 = $this->getProductVariant('Size');
        return $product_variants2;
         
    }

    private function getProductVariant($variant){
        $product_variants = ProductVariant::select('id', 'variant', 'variant_id', 'product_id')
        ->whereHas('variant', function($q) use($variant){
            $q->where('title', $variant);
        })
        ->get();

        return $product_variants;
    }



}