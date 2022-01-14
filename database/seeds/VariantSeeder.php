<?php

use Illuminate\Database\Seeder;
use App\Models\Variant;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Variant::class, 5)->create();   
    }
}
