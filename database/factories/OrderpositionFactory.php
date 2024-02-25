<?php

namespace Database\Factories;

use App\Models\Orderposition;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderpositionFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $kolvo = $this->faker->numberBetween($min = 1, $max = 10);
        $productId = $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10]);
        $price = $this->faker->numberBetween($min = 1500, $max = 6000);

        return [
            'kolvo' => $kolvo,
            'price' => $price,
            'product_id' => $productId,
        ];
    }



}
