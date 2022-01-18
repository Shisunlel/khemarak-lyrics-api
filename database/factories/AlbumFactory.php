<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artist_id' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->sentence(),
            'cover' => $this->faker->imageUrl(500, 500, 'albums'),
        ];
    }
}
