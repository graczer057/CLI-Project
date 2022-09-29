<?php

declare(strict_types=1);

namespace App\Game;

interface GameInterface
{
    public static function run(int $lives): array;
}