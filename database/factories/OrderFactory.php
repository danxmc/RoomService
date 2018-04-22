<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        /*'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'status' => random_int(0, 1),
        'room' => $faker->randomNumber($nbDigits = 3, $strict = false),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),*/
    ];
});
