<?php

declare(strict_types=1);

namespace App\Admin\Tasks;

use App\Utils\CLIReader;
use App\Utils\CLIWriter;

class TaskFactory
{
    public static function selectTask(): void
    {
        $tasks = [0 => "Dodawanie nowych poziomów", 1 => "Edytowanie istniejących poziomów", 2 => "Usuwanie istniejących poziomów", 3 => "Wyjdź z panelu administracyjnego"];

        do {
            $i = 0;

            CLIWriter::writeNl("Jakie zmiany chcez dzisiaj zastosować?");

            foreach ($tasks as $task) {
                CLIWriter::writeNl("$i -> " . $task);

                $i++;
            }

            $adminChoiceNumber = CLIReader::readInt();
        } while (!key_exists($adminChoiceNumber, $tasks));

        TasksFactory::executeTask($adminChoiceNumber);
    }
}