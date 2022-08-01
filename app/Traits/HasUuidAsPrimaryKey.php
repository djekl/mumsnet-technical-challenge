<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUUIDAsPrimaryKey
{
    public static $defaultMorphKeyType = 'uuid';

    protected static function bootHasUUIDAsPrimaryKey()
    {
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function initializeHasUUIDAsPrimaryKey()
    {
        $this->incrementing = false;

        $this->keyType = 'string';
    }
}
