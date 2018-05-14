<?php

use Illuminate\Database\Seeder;
use App\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'route' => '/img/resto/img-1.jpg',
            'user_id' => NULL,
            'meal_id' => 1,
        ]);
        Image::create([
            'route' => '/img/resto/img-2.jpg',
            'user_id' => NULL,
            'meal_id' => 2,
        ]);
        Image::create([
            'route' => '/img/resto/img-3.jpg',
            'user_id' => NULL,
            'meal_id' => 3,
        ]);
        Image::create([
            'route' => '/img/resto/img-4.jpg',
            'user_id' => NULL,
            'meal_id' => 4,
        ]);
        Image::create([
            'route' => '/img/resto/img-5.jpg',
            'user_id' => NULL,
            'meal_id' => 5,
        ]);
        Image::create([
            'route' => '/img/resto/img-6.jpg',
            'user_id' => NULL,
            'meal_id' => 1,
        ]);
        Image::create([
            'route' => '/img/resto/img-7.jpg',
            'user_id' => NULL,
            'meal_id' => 1,
        ]);
        Image::create([
            'route' => '/img/team-1.jpg',
            'user_id' => 2,
            'meal_id' => NULL,
        ]);
        Image::create([
            'route' => '/img/team-2.jpg',
            'user_id' => 1,
            'meal_id' => NULL,
        ]);
        Image::create([
            'route' => '/img/team-3.jpg',
            'user_id' => 5,
            'meal_id' => NULL,
        ]);
    }
}
