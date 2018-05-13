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
            'price' => 79.99,
            'category' => 'Food',
        ]);
        Meal::create([
            'name' => 'Hamburguer',
            'description' => 'Classic Hamburguer',
            'price' => 89.50,
            'category' => 'Food',
        ]);
        Meal::create([
            'name' => 'Tacos',
            'description' => '5 Beef Tacos',
            'price' => 50,
            'category' => 'Food',
        ]);
        Meal::create([
            'name' => 'Cinnamon Roll',
            'description' => 'Sweet Glazed Bread',
            'price' => 30,
            'category' => 'Dessert',
        ]);
        Meal::create([
            'name' => 'Lemonade',
            'description' => 'A glass of lemonade',
            'price' => 20,
            'category' => 'Drink',
        ]);
    }
}
