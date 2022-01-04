<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
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
            'phone' => $this->faker->phonenumber,
            'mobile_phone' => $this->faker->phonenumber,
            'slug' => $this->faker->slug

          ];
        }
    }
