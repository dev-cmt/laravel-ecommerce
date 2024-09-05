<?php

namespace Database\Factories;

use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Color;
use App\Models\Ecommerce\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductVariantFactory extends Factory
{
    protected $model = ProductVariant::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'img_path' => $this->faker->imageUrl(),
            'color_id' => Color::factory(), // Adjust as needed
            'size' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
