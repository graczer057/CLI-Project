<?php

declare(strict_types=1);

namespace App\Setting\Level;

class DeleteLevel implements TasksInterface
{
    public static function execute(string $configFilePath, string $fileOperationMode): void
    {
        EditFileText::changeFile(
            $configFilePath,
            $fileOperationMode,
            "Wybierz który poziom chcesz usunąć: ",
            false
        );
    }
}