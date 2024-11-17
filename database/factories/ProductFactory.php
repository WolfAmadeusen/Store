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
   public function definition(): array
   {
      return [
         'title' => $this->faker->sentence($nbWords = 3),
         'description' => $this->faker->sentence(80),
         'price' => $this->faker->randomFloat(2, 10, 1000),
         'quantity' => $this->faker->randomNumber(1, 1000),
      ];
   }
}
