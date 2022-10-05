<?php

declare(strict_types=1);

namespace App\Game;

use App\Game\Level\LevelFactory;
use App\Game\Prize\PrizeFactory;
use App\Utils\CLIWriter;
use App\Utils\GameOverException;

class ChooseGame
{
    public static function run(): void
    {
        try {
            $level = LevelFactory::selectLevel();
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        $games = GameFactory::create($level->getGamesNumber(), $level->getMaxLives());

        $tries = $games[0]->getGamesTries();

        $rescueLive = true;

        foreach ($games as $game) {
            try {
                $gameResults = StartGame::run($game, $tries, $rescueLive);

                $tries = $gameResults["tries"];

                $rescueLive = $gameResults["rescueLive"];
            } catch (GameOverException $exception) {
                CLIWriter::writeNl("Koniec Gry! - Game Over!");
                die();
            }
            $game->SetResult($gameResults["answer"]);
        }

        $firstAnswer = $games[0]?->getResult() ?? rand(0, 100);

        $secondAnswer = ($games[1] ?? null)?->getResult() ?? rand(0, 100);

        PrizeFactory::create($level->getPrizeType(), $firstAnswer, $secondAnswer);
    }
}