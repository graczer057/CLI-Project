<?php

declare(strict_types=1);

namespace App\Game\Level;

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

            $randomLevelOption = $i;

            CLIWriter::writeNl("$randomLevelOption -> Losowy poziom trudności");

            $number = CLIReader::readInt();

            if($number === $randomLevelOption) {
                $i--;
                $number = rand(0, $i);
            }
        } while (!key_exists($number, $levels));

        return $levels[$number];
    }
}