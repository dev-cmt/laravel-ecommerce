<?php

namespace Database\Factories;

use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'product_name' => $this->faker->unique()->words(rand(2, 4), true),
            'sku_code' => $this->faker->unique()->word,
            'url_slug' => Str::slug($this->faker->unique()->word),
            'main_image' => 'https://picsum.photos/640/480?random=' . $this->faker->unique()->numberBetween(1, 1000) . '&category=fashion',
            'category_id' => Category::factory(), // Adjust as needed
            'brand_id' => $this->faker->numberBetween(1, 10), // Adjust as needed
            'description' => $this->faker->paragraph,
            'short_description' => $this->faker->sentence,
            'manufacturer_name' => $this->faker->company,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'discount' => $this->faker->randomFloat(2, 0, 100),
            'tags' => json_encode($this->faker->words(3)),
            'publish_schedule' => $this->faker->dateTimeBetween('now', '+1 month'),
            'visibility' => $this->faker->randomElement(['Public', 'Hidden']),
            'status' => $this->faker->randomElement(['Published', 'Scheduled', 'Draft']),
            'meta_title' => $this->faker->sentence,
            'meta_keywords' => $this->faker->words(5, true),
            'meta_description' => $this->faker->paragraph,
            'sales_count' => $this->faker->numberBetween(0, 1000),
            'view_count' => $this->faker->numberBetween(0, 10000),
            'wishlist_count' => $this->faker->numberBetween(0, 500),
            'user_id' => User::factory(), // Adjust as needed
        ];
    }
}
