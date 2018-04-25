<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            MealsTableSeeder::class,
        ]);
        factory('App\User', 10)->create();
        factory('App\Meal', 3)->create();
        factory('App\Room', 20)->create();
        //factory('App\Order', 3)->create();
    }
}
