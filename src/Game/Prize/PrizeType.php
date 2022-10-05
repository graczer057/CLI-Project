<?php

declare(strict_types=1);

namespace App\Game\Prize;

enum PrizeType: string
{
    case TEXT = 'TEXT';
    case RECTANGLE = 'RECTANGLE';
    case TRIANGLE = 'TRIANGLE';
}
