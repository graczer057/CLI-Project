<?php

declare(strict_types=1);

namespace App\Game\GameType;

use App\Utils\CLIWriter;
use App\Utils\RandomNumbers;

class CalculatorGame implements GameInterface
{
    public static function run(int $lives, bool $rescueLive): array
    {
        $equationFirstNumber = RandomNumbers::randomNumberForExercise(1, 20);
        do {
            $equationSecondNumber = RandomNumbers::randomNumberForExercise(1, 20);
        }while($equationFirstNumber <= $equationSecondNumber);

        $sign = rand(0, 2);

        foreach(SignType::cases() as $case) {
            $cases[] = $case->value;
        }

        $correctAnswer = match($cases[$sign]) {
            "+" => $equationFirstNumber + $equationSecondNumber,
            "-" => $equationFirstNumber - $equationSecondNumber,
            "*" => $equationFirstNumber * $equationSecondNumber,
            //"/" => $equationFirstNumber / $equationSecondNumber,
        };

        CLIWriter::writeNl("Rozwiąż równanie: ");
        CLIWriter::writeNl("{$equationFirstNumber} {$cases[$sign]} {$equationSecondNumber} = ?");

        return GameProcess::playGame($correctAnswer, $lives, $rescueLive, false);
    }
}