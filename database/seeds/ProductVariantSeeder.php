<?php

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Variant;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        $product_id = $faker->randomElement(Product::pluck('id'));

        $size_variant_id = Variant::where('title', 'Size')->first()->id;
        $color_variant_id = Variant::where('title', 'Color')->first()->id;
        $style_variant_id = Variant::where('title', 'Style')->first()->id;

        $size_variants =  ['SM', 'XL'];
        foreach($size_variants as $size){
            ProductVariant::create([
                'variant' => $size,
                'variant_id' => $size_variant_id,
                'product_id' => $product_id
            ]);
        }

        
        $color_variants = ['Red', 'Green'];
        foreach($color_variants as $color){
            ProductVariant::create([
                'variant' => $color,
                'variant_id' => $color_variant_id,
                'product_id' => $product_id
            ]);
        }
        
        $style_variants = ['V-Neck', 'Round']; 
        foreach($style_variants as $style){
            ProductVariant::create([
                'variant' => $style,
                'variant_id' => $style_variant_id,
                'product_id' => $product_id
            ]);
        }

    }


    
}
