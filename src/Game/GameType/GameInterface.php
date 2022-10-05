<?php

declare(strict_types=1);

namespace App\Game\GameType;

interface GameInterface
{
    public static function run(int $lives, bool $rescueLive): array;
}