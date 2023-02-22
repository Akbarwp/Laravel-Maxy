<?php

namespace Database\Seeders;

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
        $faker = Faker::create('id_ID');

        // for ($i = 1; $i<=33; $i++) {
        //     Product::create([
        //         'product_name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        //         'product_code' => $faker->words(),
        //         'price' => $faker->randomFloat($nbMaxDecimals = null, $min = 100000, $max = null),
        //         'created_at' => $faker->dateTime($max = 'now', $timezone = null),
        //         'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
        //     ]);
        // }
        for ($i = 1; $i<=33; $i++) {
            Product::create([
                'product_name' => $faker->sentence(6),
                'product_code' => $faker->word(),
                'price' => $faker->randomFloat(2, 100000, null),
                'created_at' => $faker->dateTime('now',null),
                'updated_at' => $faker->dateTime('now',null),
            ]);
        }
    }
}
