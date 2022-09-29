<?php

declare(strict_types=1);

namespace App\Level;

use App\Utils\CLIWriter;
use App\Utils\CLIReader;

class LevelFactory
{
    public static function selectLevel(): Level
    {
        $levels = LevelsFactory::levelsFromFile('./Configuration.txt');

        return self::getLevel($levels);
    }

    private static function getLevel(array $levels): Level
    {
        do {
            CLIWriter::writeNl("Wybierz poziom trudności: ");

            $i = 0;
            foreach ($levels as $level) {
                CLIWriter::writeNl("$i -> ". $level);

                $i++;
            }

            $number = CLIReader::readInt();
        } while (!key_exists($number, $levels));

        return $levels[$number];
    }
}