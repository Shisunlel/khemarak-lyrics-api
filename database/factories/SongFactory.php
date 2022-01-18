<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
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
            'album_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->sentence(),
            'length' => $this->faker->numberBetween(10000, 30000),
            'track' => $this->faker->randomDigit(),
            'disc' => $this->faker->randomDigit(),
            'lyrics' => $this->faker->paragraph(),
        ];
    }
}
