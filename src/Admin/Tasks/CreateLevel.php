<?php

declare(strict_types=1);

namespace App\Admin\Tasks;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class CreateLevel implements TasksInterface
{
    public static function execute(string $configFilePath, string $fileOperationMode): void
    {
        $file = fopen($configFilePath, $fileOperationMode);

        CLIWriter::writeNl("Dodaj nowy poziom zapisem: Poziom trudności, liczba gier, liczba żyć, nagroda(TEXT, RECTANGLE lub TRIANGLE)");

        $line = CLIReader::readString();

        fwrite($file, $line);

        fclose($file);

        CLIWriter::writeNl("Gratulacje, właśnie dodałeś nowy poziom trudności.");

        TaskFactory::selectTask();
    }
}