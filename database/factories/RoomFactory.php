<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'room' => $faker->randomNumber($nbDigits = 3, $strict = false),
        'status' => false,
    ];
});
