<?php

declare(strict_types=1);

namespace App\Admin\Tasks;

class DeleteLevel implements TasksInterface
{
    public static function execute(string $configFilePath, string $fileOperationMode): void
    {
        $contextMessage = "Wybierz który poziom chcesz usunąć: ";

        $editConfig = false;

        editFileText::changeFile($configFilePath, $fileOperationMode, $contextMessage, $editConfig);
    }
}