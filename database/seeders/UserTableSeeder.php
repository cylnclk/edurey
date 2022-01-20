<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{

    public function run()
    {
         User::create([
            'name' => 'ceylan',
            'email' => 'ceylan@gmail.com',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'edurey',
            'email' => 'edurey@gmail.com',
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);

    }
}
