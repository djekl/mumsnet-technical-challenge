<?php

namespace App\Actions;

use App\Client\IsbnClient;
use App\Contracts\LooksUpBookIsbn;
use Ramsey\Uuid\UuidInterface;

class LookupBookIsbn implements LooksUpBookIsbn
{
    public function lookup(UuidInterface $uuid): string
    {
        $client = new IsbnClient(
            username: config('mumsnet.isbn.username'),
            password: config('mumsnet.isbn.password'),
        );

        return $client->get($uuid);
    }
}
