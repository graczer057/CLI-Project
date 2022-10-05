<?php

declare(strict_types=1);

namespace App\Setting\Level;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;
use App\Utils\Dictionary;

class EditFileText
{
    public static function changeFile(string $configFilePath, string $fileOperationMode, string $contextMessage, bool $isConfigEdit): void
    {
        $file = fopen($configFilePath, $fileOperationMode);

        $levels = [];

        while ($line = fgets($file)) {
            $levels[] = $line;
        }

        do {
            CLIWriter::writeNl($contextMessage);

            $i = 0;

            foreach ($levels as $level) {
                $levelElements = explode(', ', $level);
                $translatedPrize = Dictionary::prizesDictionary($levelElements[3]);
                CLIWriter::writeNl("$i -> Poziom Trudności: {$levelElements[0]}, Liczba gier: {$levelElements[1]}, Liczba żyć: {$levelElements[2]}, Rodzaj nagrod: {$translatedPrize}.");

                $i++;
            }

            $number = CLIReader::readInt();
        } while (!key_exists($number, $levels));

        $newLine = '';

        if ($isConfigEdit) {
            $editedLine = CLIReader::readLevel('Edytuj poziom: ');
            $newLine = "{$editedLine[0]}, {$editedLine[1]}, {$editedLine[2]}, {$editedLine[3]}";
        }

        $changeLine = file_get_contents($configFilePath);
        $changeLine = str_replace($levels[$number], $newLine, $changeLine);

        file_put_contents($configFilePath, $changeLine);

        fclose($file);

        CLIWriter::writeNl("Zmiany zostały zapisane pomyślnie.");

        TaskFactory::selectLevel();
    }
}