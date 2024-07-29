<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(mt_rand(2, 5)),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(),
            'content' => collect($this->faker->paragraphs(mt_rand(10, 15)))->map(fn ($p) => "<p>$p</p><br>")->implode(""),
            'category_id' => mt_rand(1, 4),
            'image' => null,
            'status' => mt_rand(0, 1),
            'user_id' => mt_rand(1, 10),
        ];
    }
}
