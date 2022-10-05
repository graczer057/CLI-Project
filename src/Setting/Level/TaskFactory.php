<?php

declare(strict_types=1);

namespace App\Setting\Level;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class TaskFactory
{
    private const operationsList = ["Wyświetl aktualne poziomy", "Dodawanie nowych poziomów", "Edytowanie istniejących poziomów", "Usuwanie istniejących poziomów", "Wyjdź z panelu administracyjnego"];

    public static function selectLevel(): void
    {
        $tasks = self::operationsList;

        do {
            CLIWriter::writeNl("Jakie zmiany chcesz dzisiaj zastosować?");

            foreach ($tasks as $key => $task) {
                $key++;
                CLIWriter::writeNl("$key -> " . $task);
            }

            $adminChoiceNumber = CLIReader::readInt();
            $adminChoiceNumber--;
        } while (!key_exists($adminChoiceNumber, $tasks));

        TasksFactory::executeTask($adminChoiceNumber);
    }
}