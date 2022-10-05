<?php

declare(strict_types=1);

namespace App\Game\GameType;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;
use App\Utils\GameOverException;
use App\Utils\RandomNumbers;

class EndGame
{
    public static function QTERescue(bool $rescueLive): void
    {
        if ($rescueLive === false) {
            throw new GameOverException("Koniec gry");
        }

        $secretNumber = RandomNumbers::randomNumberForExercise(100, 1000);

        $timeForUser = new \DateTimeImmutable('+ 10 seconds');

        CLIWriter::writeNl("Przepisz liczbę: '{$secretNumber}' żeby dostać jedno dodatkowe życie.");
        $userResponse = CLIReader::readInt();
        $actualDate = new \DateTime("now");

        if (($timeForUser->getTimestamp() > $actualDate->getTimestamp()) && ($userResponse === $secretNumber)) {
            CLIWriter::writeNl("Gratulacje, dostałeś jeszcze jedną szansę.");
        } else {
            die("Sory byczku, nie zdążyłeś ;(");
        }

    }
}