<?php

declare(strict_types=1);

namespace App\Utils;

class RandomNumbers
{
    public static function randomNumberForExercise (int $startRange, int $endRange): int
    {
        return rand($startRange, $endRange);
    }
}