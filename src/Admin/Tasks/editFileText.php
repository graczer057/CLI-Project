<?php

declare(strict_types=1);

namespace App\Admin\Tasks;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class editFileText
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
                CLIWriter::write("$i -> " . $level);

                $i++;
            }

            $number = CLIReader::readInt();
        } while (!key_exists($number, $levels));

        $newLine = '';

        if ($isConfigEdit === true) {
            CLIWriter::writeNl("Edytuj poziom: ");
            $newLine = CLIReader::readString();
        }

        $changeLine = file_get_contents($configFilePath);
        $changeLine = str_replace($levels[$number], $newLine, $changeLine);
        file_put_contents($configFilePath, $changeLine);

        fclose($file);

        CLIWriter::writeNl("Zmiany zostały zapisane pomyślnie.");

        TaskFactory::selectTask();
    }
}