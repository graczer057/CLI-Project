<?php

declare(strict_types=1);

namespace App\Game;

use App\Game\GameType\CalculatorGame;
use App\Game\GameType\GuessingGame;
use App\Utils\CLIWriter;

class StartGame
{
    public static function run(Game $game, int $lives, bool $rescueLive): array
    {
        switch ($game->getGameIndex()) {
            case 1:
                return CalculatorGame::run($lives, $rescueLive);
            case 2:
                return GuessingGame::run($lives, $rescueLive);
            default:
                CLIWriter::writeNl("Przykro nam, ale wystąpił niespodziewany błąd z grą. Przepraszamy za utrudnienia.");
                break;
        }
        return [];
    }
}