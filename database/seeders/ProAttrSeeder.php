<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProAttrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 400; $i++) {
            $data = [
                'id_product' => Product::all()->random()->id,
                'id_attr' => Attribute::all()->random()->id,
            ];
            DB::table('product_attrs')->insert($data);
        }
    }
}
