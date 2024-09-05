<?php

namespace Database\Factories;

use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\ProductSpecification;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSpecificationFactory extends Factory
{
    protected $model = ProductSpecification::class;

    public function definition(): array
    {
        return [
            'product_id' => Product::factory(),
            'specification_name' => $this->faker->word,
            'specification_value' => $this->faker->sentence,
        ];
    }
}
