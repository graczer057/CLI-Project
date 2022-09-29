<?php

declare(strict_types=1);

namespace App\Game;

use App\Utils\CLIWriter;
use App\Utils\RandomNumbers;

class GuessingGame implements GameInterface
{
    public static function run(int $lives): array
    {
        $startGuessingNumberRange = RandomNumbers::randomNumberForExercise(1, 10);

        $endGuessingNumberRange = $startGuessingNumberRange + 10;

        $guessingNumber = RandomNumbers::randomNumberForExercise($startGuessingNumberRange, $endGuessingNumberRange);

        CLIWriter::writeNl("Zgadnij liczbę z zakresu od: {$startGuessingNumberRange} do: {$endGuessingNumberRange}");

        return GameProcess::playGame($guessingNumber, $lives);
    }
}