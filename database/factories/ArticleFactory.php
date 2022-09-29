<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(rand(3,8)),
            'slug' => fake()->slug(),
            'content' => fake()->paragraph(rand(5,10)),
            'excerpt' => fake()->paragraph(rand(5,10)),
            'user_id' => mt_rand(1,10),
            'category_id' => mt_rand(1,3),
        ];
    }
}
