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
            'room' => '121',
            'status' => '1',
            'user_id' => '4',
        ]);
    }
}
