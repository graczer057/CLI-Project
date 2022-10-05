<?php

declare(strict_types=1);

namespace App\Setting\Level;

use App\Utils\CLIWriter;
use App\Utils\Dictionary;

class ListLevel implements TasksInterface
{

    public static function execute(string $configFilePath, string $fileOperationMode): void
    {
        $configFile = fopen($configFilePath, $fileOperationMode);

        while ($line = fgets($configFile)) {
            $levels[] = $line;
        }

        CLIWriter::writeNl("Wszystkie dostępne poziomy: ");

        $i = 0;

        foreach ($levels as $level) {
            $levelElements = explode(', ', $level);
            $translatedPrize = Dictionary::prizesDictionary($levelElements[3]);
            CLIWriter::writeNl("$i -> Poziom Trudności: {$levelElements[0]}, Liczba gier: {$levelElements[1]}, Liczba żyć: {$levelElements[2]}, Rodzaj nagrod: {$translatedPrize}.");

            $i++;
        }

        fclose($configFile);

        TaskFactory::selectLevel();
    }
}