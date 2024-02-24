<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected string $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $summ = $this->faker->numberBetween($min = 1500, $max = 6000);
        $userId = $this->faker->randomElement([1,2,3]);

        return [
            'summ' => $summ,
            'user_id' => $userId,
        ];
    }



}
