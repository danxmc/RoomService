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
            'email' => 'admin',
            'password' => '$2y$10$bfRtQPxybFNRkl7c8wnKYOAam0NbU8GnXwD9JEvj/LC8fOu4LRAwq', // admin
            'remember_token' => str_random(10),
            'role' => 'ADMIN',
            'description' => 'Administrator',
        ]);
        User::create([
            'name' => 'Chef',
            'email' => 'chef',
            'password' => '$2y$10$48TlSzvAlgs9y/SzlQgXoe76gABYknT0AUGyA.fEowKcRv0gkgpgm', // chef
            'remember_token' => str_random(10),
            'role' => 'COOK',
            'description' => 'Graduated from IEST',
        ]);
        User::create([
            'name' => 'Client',
            'email' => 'client',
            'password' => '$2y$10$uggC8Yzdt6VN/rLJL86VSe8wPP4qX6Jhk39qq3MCUalpP73zTjqje', // guest
            'remember_token' => str_random(10),
            'role' => 'CLIENT',
            'description' => NULL,
        ]);
        User::create([
            'name' => 'Client1',
            'email' => 'client1',
            'password' => '$2y$10$uggC8Yzdt6VN/rLJL86VSe8wPP4qX6Jhk39qq3MCUalpP73zTjqje', // guest
            'remember_token' => str_random(10),
            'role' => 'CLIENT',
            'description' => NULL,
        ]);
        User::create([
            'name' => 'Lobby',
            'email' => 'lobby',
            'password' => '$2y$10$bmzfZW.TtOP.9HcMnrodre2AZxDQHTfxZXoYzdwY2Ncd29Ib2VttK', // lobby
            'remember_token' => str_random(10),
            'role' => 'LOBBY',
            'description' => "Attentive and helpful :)",
        ]);
    }
}
