<?php

declare(strict_types=1);

namespace App\Game;

class GamesFactory
{
    private static int $startGamesRange = 1;
    private static int $endGamesRange = 2;

    public static function gamesFromUser(int $gamesNumber, int $maxLives): array
    {
        $games = [];

        for ($i = 0; $i < $gamesNumber; $i++){
            $randomIndex = rand(self::$startGamesRange, self::$endGamesRange);

            $games[] = new Game(
                $i,
                $randomIndex,
                $gamesNumber,
                (int)null,
                $maxLives
            );
        }

        return $games;
    }
}