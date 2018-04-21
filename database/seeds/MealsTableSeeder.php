<?php

use Illuminate\Database\Seeder;
use App\Meal;

class MealsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meal::create([
            'name' => 'Pizza',
            'description' => 'Pepperoni Pizza',
            'price' => '79.99',
        ]);
        Meal::create([
            'name' => 'Hamburguer',
            'description' => 'Classic Hamburguer',
            'price' => '89.50',
        ]);
    }
}
