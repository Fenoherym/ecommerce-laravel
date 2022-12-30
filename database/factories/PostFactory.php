<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(10, true),
            'photoUrl' => "https://cdn.pixabay.com/photo/2015/07/20/11/42/bmx-852680_960_720.jpg",
            'category_id' => random_int(1, 3)
        ];
    }
}
