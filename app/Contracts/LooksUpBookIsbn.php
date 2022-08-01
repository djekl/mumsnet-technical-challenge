<?php

namespace App\Contracts;

use Ramsey\Uuid\UuidInterface;

interface LooksUpBookIsbn
{
    public function lookup(UuidInterface $uuid): string;
}
