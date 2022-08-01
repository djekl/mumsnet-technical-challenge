<?php

namespace App\Models;

use App\Enums\BookCategory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Collector extends Model
{
    use HasFactory;

    private int $recentBookCount = 5;

    public $fillable = [
        'name',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function FictionBooks(): HasMany
    {
        return $this->hasMany(Book::class)
            ->whereCategory(BookCategory::FICTION);
    }

    public function recentlyAddedFictionBooks(): HasMany
    {
        return $this->hasMany(Book::class)
            ->whereCategory(BookCategory::FICTION)
            ->orderByDesc('created_at')
            ->limit($this->recentBookCount);
    }

    public function nonFictionBooks(): HasMany
    {
        return $this->hasMany(Book::class)
            ->whereCategory(BookCategory::NON_FICTION);
    }

    public function recentlyAddedNonFictionBooks(): HasMany
    {
        return $this->nonFictionBooks()
            ->orderByDesc('created_at')
            ->limit($this->recentBookCount);
    }

    public function technicalBooks(): HasMany
    {
        return $this->hasMany(Book::class)
            ->whereCategory(BookCategory::TECHNICAL);
    }

    public function recentlyAddedTechnicalBooks(): HasMany
    {
        return $this->technicalBooks()
            ->orderByDesc('created_at')
            ->limit($this->recentBookCount);
    }

    public function selfHelpBooks(): HasMany
    {
        return $this->hasMany(Book::class)
            ->whereCategory(BookCategory::SELF_HELP);
    }

    public function recentlyAddedSelfHelpBooks(): HasMany
    {
        return $this->selfHelpBooks()
            ->orderByDesc('created_at')
            ->limit($this->recentBookCount);
    }

    protected function recentlyAddedBooks(): Attribute
    {
        return Attribute::make(
            get: function (): Collection {
                $this->loadMissing([
                    'recentlyAddedFictionBooks',
                    'recentlyAddedNonFictionBooks',
                    'recentlyAddedTechnicalBooks',
                    'recentlyAddedSelfHelpBooks',
                ]);

                return collect([
                    'Fiction' => $this->recentlyAddedFictionBooks,
                    'Non-Fiction' => $this->recentlyAddedNonFictionBooks,
                    'Technical' => $this->recentlyAddedTechnicalBooks,
                    'Self-Help' => $this->recentlyAddedSelfHelpBooks,
                ]);
            },
        );
    }
}
