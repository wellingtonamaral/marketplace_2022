<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'body' => $this->faker->paragraph( 5, true ),
            'price' => $this->faker->randomFloat( 2, 2, 10 ),
            'slug' => $this->faker->slug
          ];
        }
    }
