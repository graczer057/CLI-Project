<?php

declare(strict_types=1);

namespace App\Game\GameType;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class GameProcess
{
    public static function playGame(int $correctAnswer, int $lives, bool $rescueLive, bool $guessingHint): array
    {
        $actualLives = $lives;

        do {
            CLIWriter::write("Zgadywana liczba to: ");

            $userAnswer = CLIReader::readInt();

            if ($userAnswer === $correctAnswer) {
                CLIWriter::writeNl("Bardzo dobrze! To jest poprawna odpowiedź.");
                break;
            }

            if ($actualLives > 0) {
                $actualLives--;
            }

            CLIWriter::writeNl("Zła odpowiedź. Pozostałe próby: {$actualLives}");

            if (($guessingHint === true) && ($actualLives <= 4)) {
                if ($userAnswer > $correctAnswer) {
                    CLIWriter::writeNl("Twoja liczba jest większa od zgadywanej liczby, podaj mniejszą liczbę.");
                } else {
                    CLIWriter::writeNl("Twoja liczba jest mniejsza od zgadywanje liczby, podaj większą liczbę.");
                }
            }

            if ($actualLives === 0) {
                EndGame::QTERescue($rescueLive);
                $actualLives++;
                $rescueLive = false;
            }

        } while ($lives > 0 || $lives == 0);

        return ["answer" => $userAnswer, "tries" => $actualLives, "rescueLive" => $rescueLive];
    }
}