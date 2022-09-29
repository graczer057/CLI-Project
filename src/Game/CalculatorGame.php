<?php

declare(strict_types=1);

namespace App\Game;

use App\Utils\CLIWriter;
use App\Utils\RandomNumbers;

class CalculatorGame implements GameInterface
{
    public static function run(int $lives): array
    {
        $equationFirstNumber = RandomNumbers::randomNumberForExercise(1, 20);
        $equationSecondNumber = RandomNumbers::randomNumberForExercise(1, 20);

        $correctAnswer = $equationFirstNumber + $equationSecondNumber;

        CLIWriter::writeNl("Rozwiąż równanie: " . PHP_EOL . "{$equationFirstNumber} + {$equationSecondNumber} = ?");

        return GameProcess::playGame($correctAnswer, $lives);
    }
}