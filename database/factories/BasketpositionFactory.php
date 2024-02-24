<?php

namespace Database\Factories;

use App\Models\Basketposition;
use Illuminate\Database\Eloquent\Factories\Factory;

class BasketpositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected string $model = Basketposition::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $kolvo = $this->faker->numberBetween($min = 1, $max = 10);
        $productId = $this->faker->randomElement([11,12,13,14,15,16,17,18,19,20]);
        $userId = $this->faker->randomElement([1,2,3]);

        return [
            'kolvo' => $kolvo,
            'product_id' => $productId,
            'user_id' => $userId,
        ];
    }



}
