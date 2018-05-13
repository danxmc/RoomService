<?php

use Faker\Generator as Faker;

$factory->define(App\Meal::class, function (Faker $faker) {
    $cats = ['Food', 'Drink', 'Dessert'];
    return [
        'name' => $faker->word,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'category' => $cats[mt_rand(0, count($cats) - 1)],
    ];
});
