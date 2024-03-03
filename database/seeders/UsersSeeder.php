<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Jorge Navarro',
            'email' => 'coke.navarro12@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
