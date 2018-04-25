<?php

use Illuminate\Database\Seeder;

class MealOrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meal_order')->insert([
            'meal_id' => 2,
            'order_id' => 1,
            'meal_quantity' => 1,
        ]);
        DB::table('meal_order')->insert([
            'meal_id' => 2,
            'order_id' => 2,
            'meal_quantity' => 2,
        ]);
        DB::table('meal_order')->insert([
            'meal_id' => 1,
            'order_id' => 2,
            'meal_quantity' => 1,
        ]);
        DB::table('meal_order')->insert([
            'meal_id' => 1,
            'order_id' => 3,
            'meal_quantity' => 4,
        ]);
        DB::table('meal_order')->insert([
            'meal_id' => 3,
            'order_id' => 4,
            'meal_quantity' => 2,
        ]);
        DB::table('meal_order')->insert([
            'meal_id' => 1,
            'order_id' => 4,
            'meal_quantity' => 1,
        ]);
        DB::table('meal_order')->insert([
            'meal_id' => 2,
            'order_id' => 5,
            'meal_quantity' => 2,
        ]);
    }
}
