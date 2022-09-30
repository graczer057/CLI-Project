<?php

declare(strict_types=1);

namespace App;

use App\Admin\Password\PasswordFactory;
use App\Admin\Password\PasswordPrompt;
use App\Admin\Password\securePassword;
use App\Admin\Tasks\TaskFactory;
use App\Menu\MenuChecker;
use App\Admin\Password\PasswordChecker;
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
        securePassword::secureOnAwake();

        try {
            $menu = MenuChecker::selectMenu();
        } catch (\Exception $e) {
            die($e->getMessage());
        }

        if ($menu->getName() === "Graj") {
            try {
                $level = LevelFactory::selectLevel();
            } catch (\Exception $e) {
                die($e->getMessage());
            }

            $games = GameFactory::create($level->getGamesNumber(), $level->getMaxLives());

            $tries = $games[0]->getGamesTries();

            $rescueLive = 1;

            foreach ($games as $game) {
                try {
                    $gameResults = StartGame::run($game, $tries, $rescueLive);

                    $tries = $gameResults["tries"];

                    $rescueLive = $gameResults["rescueLive"];

                    $game->SetResult($gameResults["answer"]);
                } catch (GameOverException $exception) {
                    CLIWriter::writeNl("Koniec Gry! - Game Over!");
                    die();
                }
            }

            $firstAnswer = $games[0]?->getResult() ?? rand(0, 100);

            $secondAnswer = ($games[1] ?? null)?->getResult() ?? rand(0, 100);

            PrizeFactory::create($level->getPrizeType(), $firstAnswer, $secondAnswer);
        } elseif ($menu->getName() === "Ustawienia") {
            try {
                $isAdminVerified = PasswordChecker::typePassword();
            } catch (\Exception $e) {
                die($e->getMessage());
            }

            if($isAdminVerified === true) {
                TaskFactory::selectTask();
            } else {
                self::start();
            }
        } else {
            die("Przykro nam, że nas opuszczasz ;(");
        }
    }

}