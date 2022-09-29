<?php

declare(strict_types=1);

namespace App\Game;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;
use App\Utils\ExceptionTest;
use App\Utils\GameOverException;
use App\Utils\RandomNumbers;
use MongoDB\BSON\Timestamp;

class EndGame
{
    public static function QTERescue(int $rescueLive): bool{
        $secretNumber = RandomNumbers::randomNumberForExercise(100, 1000);

        $timeForUser = new \DateTime("now");
        $timeForUser->add(new \DateInterval('PT20S'));

        if($rescueLive == 1)
        {
            CLIWriter::writeNl("Przepisz liczbę: '{$secretNumber}' żeby dostać jedno dodatkowe życie.");
            $userResponse = CLIReader::readInt();
            $actualDate = new \DateTime("now");

            if( ($timeForUser->getTimestamp() > $actualDate->getTimestamp()) && ($userResponse === $secretNumber) ) {
                CLIWriter::writeNl("Gratulacje, dostałeś jeszcze jedną szansę.");
                return true;
            } else {
                CLIWriter::writeNl("Sory byczku, nie zdążyłeś ;(");
                return false;
            }
        }
    }
}