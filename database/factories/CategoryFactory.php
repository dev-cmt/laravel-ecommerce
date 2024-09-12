<?php

namespace Database\Factories;

use App\Models\Ecommerce\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ecommerce\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $categoryName = $this->faker->unique()->word;

        // Fetch valid parent IDs from categories (if any exist) or set to null for root categories
        $parentCategoryIds = Category::pluck('id')->toArray();
        $parentCatId = !empty($parentCategoryIds) ? $this->faker->optional()->randomElement($parentCategoryIds) : null;

        return [
            'category_name' => $categoryName,
            'url_slug' => Str::slug($categoryName) . '-' . $this->faker->unique()->randomNumber(5),
            'parent_cat_id' => $parentCatId,
            'img_path' => $this->faker->imageUrl(640, 480, 'nature', true, 'category image'), // Fake category image URL
            'description' => $this->faker->sentence,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
