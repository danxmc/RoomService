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
        ]);
        User::create([
            'name' => 'Chef',
            'email' => 'chef@chef.com',
            'password' => '$2y$10$48TlSzvAlgs9y/SzlQgXoe76gABYknT0AUGyA.fEowKcRv0gkgpgm',
            'remember_token' => str_random(10),
            'role' => 'COOK',
        ]);
    }
}
