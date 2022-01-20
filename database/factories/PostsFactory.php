<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'image' => 'public/images/dKNyUhBvjFfbb5vCDKUwaonrJHz35Q1KvQgyxaI5.jpg',
            'active' => $this->faker->randomElement(['Yes', 'No']),
            'content' => $this->faker->sentence,
        ];
    }
}
