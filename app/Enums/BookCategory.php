<?php

namespace App\Enums;

enum BookCategory: string
{
    case FICTION = 'Fiction';
    case NON_FICTION = 'Non-Fiction';
    case TECHNICAL = 'Technical';
    case SELF_HELP = 'Self-Help';
}
