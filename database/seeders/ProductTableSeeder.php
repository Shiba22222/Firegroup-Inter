<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory  as Faker;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $limit = 500;
        for ($i = 0; $i < $limit; $i++){
            DB::table('products')->insert([
                'name' => $faker->name,
                'title' => $faker->name,
                'status' => $faker->randomElement(['pending','approve','reject']),
                'price' => $faker->numerify($string = '###'),
                'quantity' => $faker->numerify($string = '##'),
            ]);
        }
    }
}
