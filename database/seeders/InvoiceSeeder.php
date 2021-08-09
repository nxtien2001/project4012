<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'user_id' => User::all()->random()->id,
                'phone' => $faker->randomNumber(1, 20),
                'address' => $faker->address,
                'total_price' => $faker->randomNumber(1, 10),
                'status' => $faker->randomNumber(1, 6),
            ];
            DB::table('invoices')->insert($data);
        }
    }
}
