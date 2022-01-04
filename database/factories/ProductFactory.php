<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true),
            'color' => $this->faker->word(),
            'type' => $this->faker->word(),
            'size' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2,1,100),
            'image' => $this->faker->image('\temp', $width=400, $height=600),
        ];
    }
}
