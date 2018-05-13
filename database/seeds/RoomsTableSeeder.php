<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'room' => '111',
            'status' => '1',
            'user_id' => '3',
            'description' => 'Room on the first floor.',
            'capacity' => 2,
            'price' => 799.99,
        ]);
        Room::create([
            'room' => '112',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the first floor.',
            'capacity' => 2,
            'price' => 799.99,
        ]);
        Room::create([
            'room' => '113',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the first floor.',
            'capacity' => 2,
            'price' => 799.99,
        ]);
        Room::create([
            'room' => '121',
            'status' => '1',
            'user_id' => '4',
            'description' => 'Room on the second floor.',
            'capacity' => 4,
            'price' => 1050.50,
        ]);
        Room::create([
            'room' => '122',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the second floor.',
            'capacity' => 4,
            'price' => 1050.50,
        ]);
        Room::create([
            'room' => '123',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the second floor.',
            'capacity' => 4,
            'price' => 1050.50,
        ]);
        Room::create([
            'room' => '124',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the second floor.',
            'capacity' => 4,
            'price' => 1050.50,
        ]);
        Room::create([
            'room' => '125',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the second floor.',
            'capacity' => 4,
            'price' => 1050.50,
        ]);
        Room::create([
            'room' => '131',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the third floor.',
            'capacity' => 2,
            'price' => 799.99,
        ]);
        Room::create([
            'room' => '132',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the third floor.',
            'capacity' => 2,
            'price' => 799.99,
        ]);
        Room::create([
            'room' => '133',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the third floor.',
            'capacity' => 2,
            'price' => 799.99,
        ]);
        Room::create([
            'room' => '134',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the third floor.',
            'capacity' => 4,
            'price' => 1050.50,
        ]);
        Room::create([
            'room' => '135',
            'status' => '0',
            'user_id' => NULL,
            'description' => 'Room on the third floor.',
            'capacity' => 4,
            'price' => 1050.50,
        ]);
    }
}
