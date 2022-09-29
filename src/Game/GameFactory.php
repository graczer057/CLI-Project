<?php

declare(strict_types=1);

namespace App\Game;

class GameFactory
{
    public static function create(int $gamesNumber, int $maxLives): array
    {
        return GamesFactory::gamesFromUser($gamesNumber, $maxLives);
    }
}