<?php

declare(strict_types=1);

namespace App\Admin\Tasks;

class EditLevel implements TasksInterface
{
    public static function execute(string $configFilePath, string $fileOperationMode): void
    {
        $contextMessage = "Wybierz który poziom chcesz edytować: ";

        $editConfig = true;

        editFileText::changeFile($configFilePath, $fileOperationMode, $contextMessage, $editConfig);
    }
}