<?php

namespace App\Repositories;

use App\Models\Product;
use App\Traits\ProductVariantTrait;

class ProductRepository{

    use ProductVariantTrait;

    public function list(){

        $filter = $this->filterInputs();

        return Product::orderByDesc('id')
                ->with(['product_variant_prices' => function($q) use($filter){
                    $q->whereBetween('price', [$filter['price_from'], $filter['price_to']]);
                        if(request()->filled('variant')){
                            $q->where('product_variant_one', $filter['variant'])
                                ->orWhere('product_variant_one', $filter['variant'])
                                ->orWhere('product_variant_one', $filter['variant']);
                        }
                }])
                ->whereHas('product_variant_prices', function($q) use($filter){
                    $q->whereBetween('price', [$filter['price_from'], $filter['price_to']]);
                        if(request()->filled('variant')){
                            $q->where('product_variant_one', $filter['variant'])
                                ->orWhere('product_variant_one', $filter['variant'])
                                ->orWhere('product_variant_one', $filter['variant']);
                        }
                })
                ->where('title', 'like', "%".$filter['input_title']."%")
                ->where('created_at', 'like', $filter['date']."%")
                ->paginate(5);
    }

    private function filterInputs(){

        $data['input_title'] = request()->get('title') ?? '';
        $data['price_from'] = request()->get('price_from') ?? 0;
        $data['price_to'] = request()->get('price_to') ?? 99999999;
        $data['date'] = request()->get('date') ?? '';
        $data['variant'] = request()->get('variant') ?? '';
    

        return $data;
    }


    public function productVariantList1(){
        
        return $this->productVariant1();
         
    }

    
    public function productVariantList2(){
        
        return $this->productVariant2();
         
    }

}