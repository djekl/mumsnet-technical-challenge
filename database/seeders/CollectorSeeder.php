<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Collector;
use Illuminate\Database\Seeder;

class CollectorSeeder extends Seeder
{
    public function run(): void
    {
        Collector::factory(50)
            ->create()
            ->each(fn (Collector $collector) => $collector
                ->books()
                ->saveMany(
                    Book::factory(fake()->numberBetween(50, 100))
                        ->make()
                )
            );
    }
}
