<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    public $authorsId = [1, 2, 3];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'image' => $this->faker->imageUrl(),
            'author_id' => Arr::random($this->authorsId),
            'page' => rand(100, 1000),
            'release_date' => $this->faker->date,
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'description' => $this->faker->text
        ];
    }
}
