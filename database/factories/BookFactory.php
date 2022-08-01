<?php

namespace Database\Factories;

use App\Enums\BookCategory;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->realText(),
            'category' => Arr::random(BookCategory::cases()),
        ];
    }
}
