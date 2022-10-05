<?php

declare(strict_types=1);

namespace App\Setting\Level;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class CreateLevel implements TasksInterface
{
    public static function execute(string $configFilePath, string $fileOperationMode): void
    {
        $file = fopen($configFilePath, $fileOperationMode);

        $newLevelData = CLIReader::readLevel("Dodaj nowy poziom");

        $line = "{$newLevelData[0]}, {$newLevelData[1]}, {$newLevelData[2]}, {$newLevelData[3]}" . PHP_EOL;

        fwrite($file, $line);

        fclose($file);

        CLIWriter::writeNl("Gratulacje, właśnie dodałeś nowy poziom trudności.");

        TaskFactory::selectLevel();
    }
}