<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ecommerce\Brand;
use App\Models\User;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        $statuses = ['active', 'inactive'];
        $userIds = User::exists() ? User::pluck('id')->toArray() : [null]; // Fetch user IDs, or default to null if no users exist

        return [
            'brand_name' => $this->faker->company,
            'url_slug' => $this->faker->unique()->slug,
            'img_path' => $this->faker->imageUrl(640, 480, 'business', true, 'brand logo'), // Fake logo URL
            'description' => $this->faker->optional()->paragraph,
            'status' => $this->faker->randomElement($statuses),
            'user_id' => $this->faker->randomElement($userIds),
        ];
    }
}
