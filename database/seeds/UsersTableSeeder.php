<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$bfRtQPxybFNRkl7c8wnKYOAam0NbU8GnXwD9JEvj/LC8fOu4LRAwq',
            'remember_token' => str_random(10),
            'role' => 'ADMIN',
            'description' => 'Administrator',
        ]);
        User::create([
            'name' => 'Chef',
            'email' => 'chef@chef.com',
            'password' => '$2y$10$48TlSzvAlgs9y/SzlQgXoe76gABYknT0AUGyA.fEowKcRv0gkgpgm',
            'remember_token' => str_random(10),
            'role' => 'COOK',
            'description' => 'Graduated from IEST',
        ]);
        User::create([
            'name' => 'Client',
            'email' => 'client@client.com',
            'password' => '$2y$10$45ejeGIbA.iZF12zoGzfKeh3RLeELEtS2wmCA0t98LyDdFUOdOn9e',
            'remember_token' => str_random(10),
            'role' => 'CLIENT',
            'description' => NULL,
        ]);
        User::create([
            'name' => 'Client1',
            'email' => 'client1@client.com',
            'password' => '$2y$10$45ejeGIbA.iZF12zoGzfKeh3RLeELEtS2wmCA0t98LyDdFUOdOn9e',
            'remember_token' => str_random(10),
            'role' => 'CLIENT',
            'description' => NULL,
        ]);
    }
}
