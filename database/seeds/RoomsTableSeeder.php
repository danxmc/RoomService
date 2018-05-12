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
        ]);
        Room::create([
            'room' => '112',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '113',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '121',
            'status' => '1',
            'user_id' => '4',
        ]);
        Room::create([
            'room' => '122',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '123',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '124',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '125',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '131',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '132',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '133',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '134',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
        Room::create([
            'room' => '135',
            'status' => 'false',
            'user_id' => 'NULL',
        ]);
    }
}
