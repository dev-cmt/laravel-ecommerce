<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ecommerce\Color;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ecommerce\Color>
 */
class ColorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Color::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['active', 'inactive'];
        $userIds = User::exists() ? User::pluck('id')->toArray() : [null]; // Fetch user IDs, or default to null if no users exist

        return [
            'color_name' => $this->faker->safeColorName(), // Generates a random color name (e.g., "Red")
            'hex_value' => $this->faker->hexColor(),       // Generates a random HEX color code (e.g., "#FF5733")
            'status' => $this->faker->randomElement($statuses), // Randomly selects 'active' or 'inactive'
            'user_id' => $this->faker->randomElement($userIds), // Randomly assigns an existing user ID
        ];
    }
}
