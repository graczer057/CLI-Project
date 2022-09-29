<?php

declare(strict_types=1);

namespace App\Game;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;
use App\Utils\ExceptionTest;
use App\Utils\GameOverException;

class GameProcess
{
    public static function playGame(int $correctAnswer, int $lives): array
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

            if ($actualLives === 0) {
                try {
                    $new = new ExceptionTest(ExceptionTest::CUST_EXCEPTION);
                } catch (GameOverException $exp) {
                    throw new GameOverException("Koniec gry");
                } catch (\Exception $exp) {
                    echo "Default exception is caught here\n", $exp;
                }
            }
        } while ($lives > 0);

        return ["answer" => $userAnswer, "tries" => $actualLives];
    }
}