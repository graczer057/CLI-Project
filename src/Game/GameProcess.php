<?php

declare(strict_types=1);

namespace App\Game;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;
use App\Utils\GameOverException;

class GameProcess
{
    public static function playGame(int $correctAnswer, int $lives, int $rescueLive, bool $guessingHint): array
    {
        $actualLives = $lives;

        do {
            CLIWriter::write("Zgadywana liczba to: ");

            $userAnswer = CLIReader::readInt();

            if ($userAnswer === $correctAnswer) {
                CLIWriter::writeNl("Bardzo dobrze! To jest poprawna odpowiedź.");
                break;
            }

            $actualLives--;

            CLIWriter::writeNl("Zła odpowiedź. Pozostałe próby: {$actualLives}");

            if(($guessingHint === true) && ($actualLives <= 4)) {
                if ($userAnswer > $correctAnswer) {
                    CLIWriter::writeNl("Twoja liczba jest większa od zgadywanej liczby, podaj mniejszą liczbę.");
                } else {
                    CLIWriter::writeNl("Twoja liczba jest mniejsza od zgadywanje liczby, podaj większą liczbę.");
                }
            }

            if ($actualLives === 0) {
                if ($rescueLive === 1) {
                    $actualDate = new \DateTime("now");

                    $rescueStatement = EndGame::QTERescue($rescueLive, $actualDate);

                    if ($rescueStatement === false) {
                        throw new GameOverException("Koniec gry");
                    }else {
                        $actualLives++;

                        $rescueLive--;
                    }
                } else {
                    throw new GameOverException("Koniec gry");
                }
            }
        } while ($lives > 0);

        return ["answer" => $userAnswer, "tries" => $actualLives, "rescueLive" => $rescueLive];
    }
}