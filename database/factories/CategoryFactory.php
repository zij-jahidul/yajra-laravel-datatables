<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;

    public function definition(): array
    {
        // Generate a unique name and slug by appending a random number
        return [
            'name' => $this->faker->word, // Append random number for uniqueness
            'slug' => $this->faker->slug, // Append random number for uniqueness
            'logo' => '',
            'priority' => $this->faker->numberBetween(1, 10),
            'enable_homepage' => $this->faker->boolean,
            'description' => $this->faker->sentence,
            'parent_id' => null, // You can modify this if you want to create subcategories
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
