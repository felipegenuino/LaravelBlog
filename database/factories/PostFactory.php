<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'title' => $this->faker->sentence,
            'description' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(5, true),
            'slug' => Str::slug($this->faker->sentence),
            'thumbnail' => $this->faker->imageUrl(640, 480),
        ];
    }

    public function published(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'published' => true,
            ];
        });
    }
}
