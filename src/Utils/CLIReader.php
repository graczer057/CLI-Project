<?php

declare(strict_types=1);

namespace App\Utils;

class CLIReader
{
    public static function readInt(): int
    {
        return (int)fgets(STDIN);
    }
}