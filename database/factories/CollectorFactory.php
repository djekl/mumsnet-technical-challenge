<?php

namespace Database\Factories;

use App\Models\Collector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Collector>
 */
class CollectorFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
        ];
    }
}
