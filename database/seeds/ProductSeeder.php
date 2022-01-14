<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cloths = $this->clothList();


        $faker = Faker::create();

        foreach($cloths as $key => $cloth){

            Product::create([
                'title' => $cloth,
                'sku' => "clth-".$key,
                'description' => $faker->text
            ]);
        }

    }


    private function clothList(){

        return [
            'Abaya',
            'Apron',
            'Band Uniform',
            'Baseball Jersey',
            'Bathrobe',
            'Bell Bottoms',
            'Beret',
            'Bermuda Shorts',
            'Blazer',
            'Blouse',
            'Bomber Jacket',
            'Boots',
            'Burka',
            'Business Suit',
            'Caftan',
            'Cap and Gown',
            'Cardigan',
            'Cargo Shorts',
            'Chador',
            'Cheerleader Outfit',
            'Culottes',
            'Denim Jacket',
            'Dhoti',
            'Duster',
            'Fatigues',
            'Flannel Shirt',
            'Flip Flops',
            'Football Jersey',
            'Gloves',
            'A Great Bathing Suit',
            'Habit',
            'Halter Top',
            'Hanbok',
            'Hawaiian Shirt',
            'Hazmat Suit',
            'Hockey Gear',
            'Hoodies',
            'Hoop Skirt',
            'Jeans',
            'Jodhpurs',
        ];
    }
}
