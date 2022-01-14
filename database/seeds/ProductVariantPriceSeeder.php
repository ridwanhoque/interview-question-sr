<?php

use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductVariantPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $product_variant_one = $this->colorVariantIds();
        $product_variant_two = $this->sizeVariantIds();
        $product_variant_three = $this->styleVariantIds();

        $prices = [150, 15];
        $stocks = [150, 15, 54];

        $product_ids = Product::pluck('id');

        foreach(range(1, 10) as $index){

            ProductVariantPrice::create([
                'product_variant_one' => $faker->randomElement($product_variant_one), //color 
                'product_variant_two' => $faker->randomElement($product_variant_two), //size
                'product_variant_three' => $faker->randomElement($product_variant_three), //style
                'price' => $faker->randomElement($prices),
                'stock' => $faker->randomElement($stocks),
                'product_id' => $faker->randomElement($product_ids)
            ]);

        }

    }

    private function colorVariantIds(){
        return ProductVariant::whereHas('variant', function($q){
            $q->where('title', 'Color');
        })->pluck('id');
    }

    private function sizeVariantIds(){
        return ProductVariant::whereHas('variant', function($q){
            $q->where('title', 'Size');
        })->pluck('id');
    }

    private function styleVariantIds(){
        return ProductVariant::whereHas('variant', function($q){
            $q->where('title', 'Style');
        })->pluck('id');
    }
}
