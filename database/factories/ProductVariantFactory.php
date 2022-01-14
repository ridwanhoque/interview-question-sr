<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Variant;
use Faker\Generator as Faker;

$factory->define(ProductVariant::class, function (Faker $faker) {
    return [
        'variant' => $faker->name(),
        'variant_id' => $faker->randomElement(Variant::pluck('id')),
        'product_id' => $faker->randomElement(Product::pluck('id'))
    ];
});
