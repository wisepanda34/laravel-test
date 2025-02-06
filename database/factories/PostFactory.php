<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'content' => $this->faker->text(20),
            'description' => $this->faker->text(20),
            'image' => $this->faker->imageUrl(),
            'likes' => random_int(1, 100),
            'is_published' => 1,
            'category_id' => Category::all()->random()->id
        ];
    }
}
