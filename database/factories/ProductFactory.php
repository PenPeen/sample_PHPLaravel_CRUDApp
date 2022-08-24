<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            //
            'name' =>  '製品' . $this->faker->randomNumber(9),
            'type_id' => $this->faker->numberBetween($min=1, $max=6),
            'price' => $this->faker->numberBetween(100, 1000000)
        ];
    }
}
