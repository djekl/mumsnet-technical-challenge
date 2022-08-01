<?php

namespace App\Models;

use App\Actions\LookupBookIsbn;
use App\Enums\BookCategory;
use App\Traits\HasUUIDAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class Book extends Model
{
    use HasFactory;
    use HasUUIDAsPrimaryKey;

    public $fillable = [
        'title',
        'category',
        'isbn',
        'collector_id',
    ];

    public $casts = [
        'id' => 'string',
        'title' => 'string',
        'category' => BookCategory::class,
        'collector_id' => 'int',
    ];

    public static function boot(): void
    {
        parent::boot();

        // in reality this would be a queued event
        static::saved(static function (self $book) {
            if (null === $book->isbn) {
                $book->isbn = (new LookupBookIsbn)->lookup(Uuid::fromString($book->id));
                $book->saveQuietly();
            }
        });
    }

    public function collector(): BelongsTo
    {
        return $this->belongsTo(Collector::class);
    }
}
