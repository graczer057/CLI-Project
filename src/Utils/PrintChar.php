<?php

declare(strict_types=1);

namespace App\Utils;

class PrintChar
{
    public static function print(int $number, string $char): void
    {
        for ($i = 0; $i < $number; $i++)
        {
            echo $char;
        }
    }
}