<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'parse_name' => strtolower(str_replace(' ', '-', $this->faker->name())),
            'image' => $this->faker->imageUrl(300, 300, 'person'),
        ];
    }
}
