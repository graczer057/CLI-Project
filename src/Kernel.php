<?php

namespace App;

use App\Game\GameFactory;
use App\Game\StartGame;
use App\Level\LevelFactory;
use App\Prize\PrizeFactory;
use App\Utils\CLIWriter;
use App\Utils\GameOverException;

class Kernel
{
    public static function start(): void
    {
        try {
            $level = LevelFactory::selectLevel();
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        $games = GameFactory::create($level->getGamesNumber(), $level->getMaxLives());

        $tries = $games[0]->getGamesTries();

        foreach ($games as $game) {
            try {
                $gameResults = StartGame::run($game, $tries);
                $tries = $gameResults["tries"];
                $game->SetResult($gameResults["answer"]);
            } catch (GameOverException $exception) {
                CLIWriter::writeNl("Koniec Gry! - Game Over!");
                die();
            }
        }

        $firstAnswer = $games[0]?->getResult() ?? rand(0, 100);

        $secondAnswer = ($games[1] ?? null)?->getResult() ?? rand(0, 100);

        PrizeFactory::create($level->getPrizeType(), $firstAnswer, $secondAnswer);
    }
}