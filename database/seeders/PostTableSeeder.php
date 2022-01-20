<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Seeder;


class PostTableSeeder extends Seeder
{

    public function run()
    {
        Posts::factory(5)->create();
    }
}
