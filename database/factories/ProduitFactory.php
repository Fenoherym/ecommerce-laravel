<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(),
            "description" => $this->faker->paragraph(3, true),
            "price" => random_int(500, 10000),
            "photoUrl" => "https://cdn.pixabay.com/photo/2017/05/19/14/09/ps4-2326616_960_720.jpg",
            "category_id" => random_int(1, 3)
        ];
    }
}
