<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductVariant;
use App\Models\Product;
use App\Models\ProductVariantPrice;
use Faker\Generator as Faker;

$factory->define(ProductVariantPrice::class, function (Faker $faker) {
    return [
        'product_variant_one' => $faker->randomElement(ProductVariant::pluck('id')),
        'product_variant_two' => $faker->randomElement(ProductVariant::pluck('id')),
        'product_variant_three' => $faker->randomElement(ProductVariant::pluck('id')),
        'price' => $faker->randomNumber(5),
        'stock' => $faker->randomNumber(2),
        'product_id' => $faker->unique()->randomElement(Product::pluck('id'))
    ];
});
