<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'image' => 'public/images/yI8qfPTjWu3ON9i2pX2NnMgrUmrhRq40v7eDHE9N.jpg',
            'active' => $this->faker->randomElement(['Yes', 'No']),
            'content' => $this->faker->sentence,
        ];
    }
}
