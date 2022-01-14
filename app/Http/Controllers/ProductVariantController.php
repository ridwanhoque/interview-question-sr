<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function getByVariant($variant_id){
        $product_variants = ProductVariant::where('variant_id', $variant_id)
                                        ->get();

        return $product_variants;
    }
}
