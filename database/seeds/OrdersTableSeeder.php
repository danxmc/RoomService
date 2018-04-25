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
            'user_id' => '3',
            'phone' => '1234567',
            'status' => '0',
            'description' => 'No Lettuce',
        ]);
        Order::create([
            'user_id' => '3',
            'phone' => '7654321',
            'status' => '1',
            'description' => 'No Mustard on Hamburguer',
        ]);
        Order::create([
            'user_id' => '3',
            'phone' => '1234567',
            'status' => '0',
            'description' => '',
        ]);
        Order::create([
            'user_id' => '3',
            'phone' => '7654321',
            'status' => '1',
            'description' => '',
        ]);
        Order::create([
            'user_id' => '4',
            'phone' => '7654321',
            'status' => '1',
            'description' => 'Xd',
        ]);
    }
}
