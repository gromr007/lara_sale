<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected string $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $name = $this->faker->sentence;
        $name = $this->faker->unique()->text(rand(5,15));
        $slug = Str::slug($name, '_');
        $price = $this->faker->numberBetween($min = 1500, $max = 6000);
        $description = $this->faker->realText(rand(300,700));
        //$image = $this->faker->imageUrl($width = 270, $height = 303);
        $image = '/images/product/' . $this->faker->randomElement([
            'product-01.webp',
            'product-02.webp',
            'product-03.webp',
            'product-04.webp',
            'product-05.webp',
            'product-06.webp',
            'product-07.webp',
            'product-08.webp',
            'product-09.webp',
            'product-10.webp',
            'product-12.webp',
            'product-13.webp',
        ]);

        return [
            'slug' => $slug,
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'image' => $image,
        ];
    }



}
