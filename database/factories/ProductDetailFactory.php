<?php

namespace Database\Factories;

use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\ProductDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDetailFactory extends Factory
{
    protected $model = ProductDetail::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'detail_name' => $this->faker->word,
            'detail_value' => $this->faker->sentence,
        ];
    }
}
