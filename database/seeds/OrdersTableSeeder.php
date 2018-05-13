<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'user_id' => 3,
            'phone' => '1234567',
            'status' => false,
            'description' => 'No Lettuce',
        ]);
        Order::create([
            'user_id' => 3,
            'phone' => '7654321',
            'status' => true,
            'description' => 'No Mustard on Hamburguer',
        ]);
        Order::create([
            'user_id' => 3,
            'phone' => '1234567',
            'status' => false,
            'description' => '',
        ]);
        Order::create([
            'user_id' => 3,
            'phone' => '7654321',
            'status' => true,
            'description' => '',
        ]);
        Order::create([
            'user_id' => 4,
            'phone' => '7654321',
            'status' => true,
            'description' => 'Xd',
        ]);
    }
}
